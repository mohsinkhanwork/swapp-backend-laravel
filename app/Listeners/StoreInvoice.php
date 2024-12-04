<?php

namespace App\Listeners;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Events\TransactionCompleted;

class StoreInvoice
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
        $transaction_id=$data['id'];
        $invoice=Invoice::where('transaction_id',$transaction_id)->first();
        if(!$invoice){
            $isoDatetime = $data['billed_at'];
            $billed_at = Carbon::parse($isoDatetime)->toDateTimeString();
            $customer=Cashier::findBillable($data['customer_id']);
            $customer->invoices()->create([
                'transaction_id'=>$transaction_id,
                'billed_at'=>$billed_at,
                'invoice_number'=>$data['invoice_number'],
                'amount'=>$data['details']['totals']['total'],
                'currency'=>$data['details']['totals']['currency_code'],
            ]);
        }

    }
}
