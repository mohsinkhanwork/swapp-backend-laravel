<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdStatus;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\AdApprovedNotification;
use App\Notifications\AdRejectedNotification;
use App\Notifications\AdvertisementNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdController extends Controller
{
    public function index(){
        $status=request('status','under_review');
        $data['ads']=Advertisement::with('package','advertiser')->whereStatus($status)->get();
        $data['pending']=Advertisement::whereStatus(AdStatus::PENDING)->count();
        $data['under_review']=Advertisement::whereStatus(AdStatus::UNDER_REVIEW)->count();;
        $data['approved']=Advertisement::whereStatus(AdStatus::APPROVED)->count();;
        $data['rejected']=Advertisement::whereStatus(AdStatus::REJECTED)->count();;
        $data['completed']=Advertisement::whereStatus(AdStatus::COMPLETED)->count();;
        return view('admin.ads.index',$data);
    }

    public function show(Advertisement $ad){
        return view('admin.ads.single',compact('ad'));
    }

    public function approve(Advertisement $ad){
        $ad->published_at=now();
        $ad->status=AdStatus::APPROVED;
        $ad->ends_on=now()->addDays($ad->duration);
        $ad->save();

        if ($ad->package->type=='notification') {
            $this->sendNotitficationAd($ad);
        }
        $ad->advertiser->notify(new AdApprovedNotification($ad->title,$ad->id));

        activity()->causedBy(auth()->user())->performedOn($ad)->withProperties($ad)->log('Admin approved an ad.');
        return redirect()->back()->with('success','Ad Approved Successfully');
    }

    public function reject(Request $request, Advertisement $ad){
        $data=$request->validate([
            'reject_reason'=>'required'
        ]);
        $ad->status=AdStatus::REJECTED;
        $ad->reject_reason=$request->reject_reason;
        $ad->save();
        $ad->advertiser->notify(new AdRejectedNotification($ad->title,$ad->reject_reason,$ad->id));

        activity()->causedBy(auth()->user())->performedOn($ad)->withProperties($ad)->log('Admin rejected an ad.');
        return redirect()->back()->with('success','Ad Rejected Successfully');
    }

    private function sendNotitficationAd(Advertisement $ad){
        $skills=Skill::where('category_id',$ad->skill_category_id)->pluck('id')->toArray();
        $users=User::whereHas('skills',function($qry)use ($skills){
             $qry->whereIn('skills.id',$skills);
            })->select('id','email')->get();
        $data=[
            'id'=>$ad->id,
            'type'=>'advertisement',
            'title'=>$ad->title,
            'description'=>$ad->description
        ];
        if($users->count()>=500){
            $users->chunk(500, function ($chunk) use ($data){
                Notification::send($chunk, new AdvertisementNotification($data));
            });
        }else{
            Notification::send($users, new AdvertisementNotification($data));
        }
        $ad->status=AdStatus::COMPLETED;
        $ad->save();
    }
}
