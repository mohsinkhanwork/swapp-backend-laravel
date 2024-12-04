<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserListingResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\FeedListResource;
use App\Models\Newsletter;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Feed;
use App\Notifications\AccountDeactivateNotification;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends ApiController
{
    public function user(){
        $user=Auth::user();
        $user->load('skills');
        return $this->successResponse(new UserResource($user));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'nullable',
            'bio'=>'nullable',
            'profession_id'=>'nullable',
            'avatar'=>'nullable',
            'timezone'=>'nullable',
            'language'=>['nullable']
        ]);
        $user=Auth::user();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->phone=$request->phone;
        $user->bio=$request->bio;
        $user->profession_id=$request->profession_id;
        $user->language=$request->language;
        $user->timezone=$request->timezone;
        $user->newsletter_subscribed = filter_var($request->newsletter_subscribed, FILTER_VALIDATE_BOOLEAN);

        $file = $request->file('avatar');
        if ($file) {
            if ($user->avatar) {
                $oldImagePath = parse_url($user->avatar, PHP_URL_PATH);
                $oldImagePath = ltrim($oldImagePath, '/');
                Storage::disk('public')->delete($oldImagePath);
            }
            $imagePath = $file->store('avatars', 'public');
            $user->avatar = Storage::url($imagePath);
        }
        $user->save();
        $skills = $request->input('skills');    
        if($skills) {
            $user->skills()->sync($skills);
        }
        $user->load('skills');
        return $this->successResponse(new UserResource($user),'updated successfully');
    }

    public function updateSocialLinks(Request $request){
        $data=$request->validate([
            'facebook_link'=>'nullable',
            'instagram_link'=>'nullable',
            'linkedin_link'=>'nullable'
        ]);
        $user=Auth::user();
        $user->update($data);
        return $this->successResponse(null,'Social Links updated successfully');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>['required','confirmed','min:8']
        ]);
        $user=Auth::user();
        if(Hash::check($request->current_password,$user->password)){
          $user->password=bcrypt($request->password);
          $user->save();
          return $this->successResponse(null,'Password updated successfully');
        }
        return $this->errorResponse('Invalid Password',400);
    }

    public function enable2FA(Request $request){
        $request->validate([
            'status'=>['required','in:0,1']
        ]);
        $user=Auth::user();
        $user->enable_2fa=$request->status;
        $user->save();
        return $this->successResponse(null,'updated successfully');
    }

    public function users(){
        $user = Auth::user();
        $blocked_users = $user->blockedUsers()->pluck('users.id')->toArray();
        $blocked_users[] = $user->id;
        $users = User::whereNotIn('id', $blocked_users)
            ->with(['skills','profession'])
            ->withAvg('swapDetails as avg_rating', 'rating')
            ->withCount(['swapDetails as rating_count' => function($qry) {
                $qry->whereNotNull('rating');
            }]);
        $skills=request('skills','');
        $search=request('search','');
        $ratings=request('rating',[]);
        $location=request('location','');
        $profession=request('profession','');

        if($skills!=''){
            $users=$users->whereHas('skills',function($qry) use($skills){
                $qry->whereIn('skill_id',$skills);
            });
        }
        if($location!=''){
            $users=$users->where('country_id', $location);
        }
        if($profession!=''){
            $users=$users->whereHas('profession',function($qry) use($profession){
                $qry->where('profession_id',$profession);
            });
        }
        if($search!=''){
            $users=$users->where(function($qry) use($search){
                $qry->where('first_name','like',"%$search%")
                    ->orWhere('last_name','like',"%$search%")
                    ->orWhere('username','like',"%$search%")
                    ->orWhereHas('profession',function($qry) use($search){
                        $qry->where('title_en','like',"%$search%")->orWhere('title_tr','like',"%$search%");
                    });
            });
        }
        if (!empty($ratings)) {
            $users = $users->having('avg_rating', '>=', min($ratings)); 
        }             
        $users=$users->paginate(15);
        return $this->successResponse(new UserListingResource($users));
    }

    public function userDetail($username){
        $user=User::where('username',$username)->first();
        if(!$user){
            return abort(404);
        }
        $user->load('skills');
        return $this->successResponse(new UserResource($user));
    }

    public function getData(){
        $language=request('language','english');
        $data['languages']=config('langauges.available');
        $data['timezones'] = DateTimeZone::listIdentifiers();
        if ($language=='turkish') {
            $data['professions']=getProfessionList('tr');
            $data['skills']=getSkillList('tr');
            $data['user_skills']=Skill::whereHas('users')->withCount('users')->get()->map(function($skill){
                return [
                    'id'=>$skill->id,
                    'title'=>$skill->title_tr,
                    'users_count'=>$skill->users_count,
                ];
            });
        }else{
            $data['professions']=getProfessionList('en');
            $data['skills']=getSkillList('en');
            $data['user_skills']=Skill::whereHas('users')->withCount('users')->get()->map(function($skill){
                return [
                    'id'=>$skill->id,
                    'title'=>$skill->title_en,
                    'users_count'=>$skill->users_count,
                ];
            });
        }
        
        $data['forum_tags']=Tag::whereHas('forumQuestions')->withCount('forumQuestions')->get()->map(function($tag){
            return [
                'id'=>$tag->id,
                'name'=>$tag->name,
                'questions_count'=>$tag->forum_questions_count,
            ];
        });
        return $this->successResponse($data);
    }

    public function subscribeNewsletter(){
        $user=Auth::user();
        $user->newsletter_subscribed=!$user->newsletter_subscribed;
        $user->save();
        Newsletter::updateOrCreate([
            'email'=>$user->email
        ],[
            'subscribed'=>$user->newsletter_subscribed
        ]);
        return $this->successResponse(null,"NewsLetter status updated successfully");
    }

    public function deactivateAccount(Request $request){
        $request->validate([
            'password'=>'required',
        ]);
        $user=Auth::user();
        if(Hash::check($request->password,$user->password)){
            $user->notify(new AccountDeactivateNotification($user->name));
            $user->tokens()->delete();
            $user->delete();
          return $this->successResponse(null,'Account deactivated');
        }
        return $this->errorResponse('Invalid Password',400);
    }

    public function getUserFeed(Request $request, $username){
        $user=User::where('username',$username)->first();
        if(!$user){
            return abort(404);
        }
        $feeds = Feed::query()->with('attachments')
            ->where('user_id',$user->id)
            ->orderBy('id','desc')->with(['user'])->paginate(10);
        return $this->successResponse(new FeedListResource($feeds));
    }
}
