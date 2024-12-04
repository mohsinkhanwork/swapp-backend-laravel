<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Paddle\Events\SubscriptionCreated;
use Laravel\Paddle\Subscription;

class PaddleSubscriptionEventListener
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
    public function handle(SubscriptionCreated $event): void
    {
        $payload = $event->payload;
        $data=$payload['data'];
        $plan_id = $data['custom_data']['plan_id'] ?? null;
        $subscription= Subscription::where('paddle_id',$data['id'])->first();
        if($subscription){
            $user=$subscription->billable;
            $user->plan_id=$plan_id;
            $user->save();
        }
    }
}
