<?php

namespace App\Listeners;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Paddle\Events\SubscriptionCanceled;
use Laravel\Paddle\Subscription;

class PaddleCancelSubscriptionEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SubscriptionCanceled $event): void
    {
        $payload = $event->payload;

        $data=$payload['data'];
        $subscription= Subscription::where('paddle_id',$data['id'])->first();
        if($subscription){
            $user=$subscription->billable;
            $free_plan=Plan::whereType('free')->first();
            $user->plan_id=$free_plan->id;
            $user->save();
        }
    }
}
