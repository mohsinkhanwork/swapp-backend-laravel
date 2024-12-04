<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\FeedResource;
use App\Http\Resources\NotificationAdResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\SwapResource;
use App\Models\Advertisement;
use App\Models\Feed;
use App\Models\Swap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends ApiController
{
    public function getNotifications(){
        $user=Auth::user();
        $notifications=$user->notifications()->paginate(20);
        return $this->successResponse(new NotificationResource($notifications));
    }

    public function getSingleNotification($notification){
        $notification = auth()->user()->notifications()->findOrFail($notification);
        $notification->markAsRead();
        $data=[];
        $type=$notification->data['type']??'';
        $id=$notification->data['id']??'';
        if($type=='advertisement'){
            $data=$this->getAd($id);
        }
        else if($type=='swap-request'){
            $data=$this->getSwapRequest($id);
        }
        else if($type=='feed'){
            $data=$this->getFeed($id);
        }
        return $this->successResponse($data);
    }

    private function getAd($id){
        $ad=Advertisement::findOrFail($id);
        $ad->views()->create([
            'user_id'=>Auth::user()->id
        ]);
        $ad->increment('views');
        return new NotificationAdResource($ad);
    }

    private function getSwapRequest($id){
        $swap=Swap::findOrFail($id);
        return new SwapResource($swap);
    }

    private function getFeed($id){
        $feed=Feed::findOrFail($id);
        return new FeedResource($feed);
    }
}
