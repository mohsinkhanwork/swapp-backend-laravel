<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserListingResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends ApiController
{
    public function follow(Request $request){
        $request->validate([
            'user_id'=>'required'
        ]);
        $user=User::findOrFail($request->user_id);
        $u=$request->user();
        $following=$u->following()->where('following_id',$user->id)->first();
        if($following || $u->id==$user->id){
            return $this->errorResponse('Already Following',400);
        }
        $u->following()->attach($user->id);
        return $this->successResponse(null,'Followed Successfully');
    }

    public function unfollow(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id' 
        ]);
    
        $userToUnfollow = User::findOrFail($request->user_id); 
        $currentUser = $request->user(); 

        $isFollowing = $currentUser->following()->where('following_id', $userToUnfollow->id)->exists();
        
        if (!$isFollowing || $currentUser->id == $userToUnfollow->id) {
            return response()->json(['error' => "You cannot unfollow $userToUnfollow->name."], 400);
        }

        $currentUser->following()->detach($userToUnfollow->id);
        
        return $this->successResponse(null, 'Unfollowed Successfully');
    }    

    public function followers(){
        $user=Auth::user();
        $search=request('search','');
        $order=request('order','');
        $q=$user->followers()->where('users.id','!=',$user->id)
            ->when($search!='',function($qry) use($search){
                $qry->where(function($query) use($search){
                    $query->where('first_name','like',"%$search%")
                        ->orWhere('last_name','like',"%$search%")
                        ->orWhere('email','like',"%$search%")
                        ->orWhere('username','like',"%$search%")
                        ->orWhereHas('profession', function ($professionQuery) use ($search) {
                            $professionQuery->where('title_en', 'like', "%$search%");
                        });
                });
            });
            if($order && $order['column']) {
                $q->orderBy($order['column'], $order['sort']);
            }           
        $users= $q->paginate(20);
        return $this->successResponse(new UserListingResource($users));
    }

    public function following(){
        $user=Auth::user();
        $search=request('search','');
        $users=$user->following()->where('users.id','!=',$user->id)
                    ->when($search!='',function($qry) use($search){
                        $qry->where(function($query) use($search){
                            $query->where('first_name','like',"%$search%")
                                ->orWhere('last_name','like',"%$search%")
                                ->orWhere('email','like',"%$search%")
                                ->orWhere('username','like',"%$search%")
                                ->orWhereHas('profession', function ($professionQuery) use ($search) {
                                    $professionQuery->where('title_en', 'like', "%$search%");
                                });
                        });
                    })
                    ->paginate(20);
        return $this->successResponse(new UserListingResource($users));
    }
}
