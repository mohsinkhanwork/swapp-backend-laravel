<?php

use App\Enums\AdStatus;
use App\Enums\SupportStatus;
use App\Models\Admin;
use App\Models\Advertisement;
use App\Models\ContactUs;
use App\Models\Profession;
use App\Models\Setting;
use App\Models\SkillCategory;
use App\Models\SupportTicket;
use App\Notifications\AdminNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

if(!function_exists('generateModelSlug')){
    /**
     * @param Model $model
     * @param String $title
     * @param Integer $id
     * @return $slug
     */
    function generateModelSlug(Model $model,$title,$id=null){
        $count=1;
        do {
            if($count>1){
                $slug=Str::slug($title).'-'.$count;
            }else{
                $slug=Str::slug($title);
            }
            $slug_exist=$model::whereSlug($slug)->where('id','!=',$id)->first();
            $count++;
        } while ($slug_exist);
        return $slug;
    }
}

if(!function_exists('getSettingValue')){
    function getSettingValue($key){
        return Setting::where('key',$key)->first()->value??'';
   }
}


if(!function_exists('GetAdsInReviewCount')){
    function GetAdsInReviewCount(){
        return Advertisement::where('status',AdStatus::UNDER_REVIEW)->count();
   }
}

if(!function_exists('GetSupportCount')){
    function GetSupportCount(){
        return SupportTicket::whereIn('status',[SupportStatus::WAITING_REPLY,SupportStatus::PROCESS])->count();
   }
}

if(!function_exists('GetAdvertiserSupportCount')){
    function GetAdvertiserSupportCount(){
        $advertiser=Auth::guard('advertiser')->user();
        return $advertiser->supportTickets()->where('status',[SupportStatus::ANSWERED])->count();
   }
}

if(!function_exists('GetContactQueriesCount')){
    function GetContactQueriesCount(){
        return ContactUs::where('seen',false)->count();
   }
}

if(!function_exists('printLogData')){
    function printLogData($properties){
        $changes=convertArraytoKeyPair(json_decode($properties,true));
        return $changes;
   }
}

if(!function_exists('convertArraytoKeyPair')){
    function convertArraytoKeyPair($array,$step=1){
        $changes='';
        foreach($array as $key => $value){
            if(gettype($value)=='array'){
                if($step==1){
                    $changes.="$key: \n\n";
                }
                $changes.=convertArraytoKeyPair($value,2). "\n";
            }else{
                if($step==2){
                    $changes.="     ";
                }
                $changes.="$key: $value\n";
            }
        }
        return $changes;
   }
}

if(!function_exists('notifyAdmin')){
    /**
     * @param Array $data
     * @param String $permission
     * @return Bool
    */
    function notifyAdmin($data,$permission){
        $admins=Admin::whereHas('roles.permissions',function($qry) use ($permission){
            $qry->where('name',$permission);
        })->get();
        Notification::send($admins,new AdminNotification($data));
        return true;
   }
}


if(!function_exists('isFollowing')){
    function isFollowing($user_id){
        $user=Auth::user();
        if($user){
            $following=$user->following()->where('following_id',$user_id)->first();
            return $following?true:false;
        }
        return false;
   }
}

if(!function_exists('getSkillList')){
    function getSkillList($lang){
            $skillsByCategory = SkillCategory::with('skills')->get()->map(function ($category)  use($lang){
                Log::info('Category:', ['category' => $category]);
                return [
                    'category' =>$lang=='tr'?$category->title_tr:$category->title_en,
                    'skills' => $category->skills->map(function($skill) use($lang){
                        Log::info('Skill:', ['skill' => $skill]);
                        return [
                            'id'=>$skill->id,
                            'title'=>$lang=='tr'?$skill->title_tr:$skill->title_en
                        ];
                    })
                ];
            });
        Log::info('Skills by Category:', ['skillsByCategory' => $skillsByCategory]);
        return $skillsByCategory->toArray();
   }
}


if(!function_exists('getProfessionList')){
    function getProfessionList($lang){
        if($lang=='tr'){
            $professions= Profession::select('heading_tr as heading','title_tr as title','id')->get()->groupBy('heading');
        }else{
            $professions= Profession::select('heading_en as heading','title_en as title','id')->get()->groupBy('heading');
        }
        $list=[];
       foreach($professions as $key=>$profession){
        $list[]=[
            'category'=>$key,
            'professions'=>$profession->map(function($pro){
                return [
                    'id'=>$pro->id,
                    'title'=>$pro->title,
                ];
            })
        ];
       }
        return $list;
   }
}

if(!function_exists('getLanguage')){
    function getLanguage(){
        return request('language','en');
   }
}
