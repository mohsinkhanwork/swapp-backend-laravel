<?php

namespace App\Listeners;

use App\Enums\AdStatus;
use App\Models\Advertisement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Paddle\Events\TransactionCompleted;

class AdvertisementCheckout
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
    public function handle(TransactionCompleted $event): void
    {
        $payload = $event->payload;
        $data=$payload['data'];
        $ad_id = $data['custom_data']['ad_id'] ?? null;
        $ad=Advertisement::find($ad_id);
        if($ad){
            $ad->transaction_id=$data['id'];
            $ad->status=AdStatus::UNDER_REVIEW;
            $ad->save();

            notifyAdmin(
                ['id'=>$ad->id,'type'=>'ad','title'=>'New Advertisement','description'=>'New Advertisement is waiting approval.'],
                'ads-management'
            );
        }

    }
}
