<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\TransactionResource;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends ApiController
{
    public function transactions(){
        $user=Auth::user();
        $transactions=$user->transactions;
        return $this->successResponse(TransactionResource::collection($transactions));
    }

    public function cancel(){
        $user=Auth::user();
        $activeSubscription = $user->subscription();
        if($activeSubscription && $activeSubscription->active()){
            $user->subscription()->cancelNow();
            $free_plan=Plan::whereType('free')->first();
            $user->plan_id=$free_plan->id;
            $user->save();
            return $this->successResponse(null,'Subscription cancelled successfully');
        }
        return $this->errorResponse("You don't have any active subscription",400);
    }

    public function pause(){
        $user=Auth::user();
        $activeSubscription = $user->subscription();
        if($activeSubscription && $activeSubscription->active()){
            $user->subscription()->pauseNow();
            $free_plan=Plan::whereType('free')->first();
            $user->plan_id=$free_plan->id;
            $user->save();
            return $this->successResponse(null,'Subscription paused successfully');
        }
        return $this->errorResponse("You don't have any active subscription",400);
    }

    public function resume(){
        $user=Auth::user();
        $subscription = $user->subscription();
        if ($subscription && $subscription->paused()) {
            $subscription->resume();
            $item=$subscription->items->first();
            if($item){
                $plan=Plan::where('monthly_price_id',$item->price_id)->first();
                if($plan){
                    $user->plan_id=$plan->id;
                    $user->save();
                }
            }
            return $this->successResponse(null,'Subscription resumed successfully');
        }
        return $this->errorResponse("You don't have any pause subscription",400);
    }
}
