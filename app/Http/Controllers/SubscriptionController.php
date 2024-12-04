<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Paddle\Transaction;

class SubscriptionController extends Controller
{

    public function subscribe(Plan $plan,$type){
        $user=Auth::user();
        $price_id=$plan->monthly_price_id;
        if($type=='yearly'){
            $price_id=$plan->yearly_price_id;
        }
        $checkout = $user->checkout($price_id)
        ->returnTo(route('subscription.callback',$plan->uuid))
        ->customData(['plan_id' => $plan->id]);
        return view('subscription.subscribe', ['checkout' => $checkout]);
    }

    public function handleCallback(Plan $plan){
        $user=Auth::user();
        if ($user) {
            return redirect()->route('subscription.success')->with('success','Premium Plan Subscribed Successfully');
        }
        return redirect()->route('home');
    }

    public function success(){
        $success=session()->get('success');
        $payment_method=request('payment_method',null);
        if($success || $payment_method){
            return view('subscription.success',compact('payment_method'));
        }
        return redirect()->route('home');
    }

    public function downloadInvoice(Transaction $transaction){
        $user=Auth::user();
        $transaction=$user->transactions->where('id',$transaction->id)->first();
        if($transaction){
            return $transaction->redirectToInvoicePdf();
        }
        return abort(404);
    }

    public function updatePaymentMethod(Request $request){
        $user = $request->user();
        if($user->subscription()){
            return $user->subscription()->redirectToUpdatePaymentMethod();
        }
        return redirect()->route('home');
    }

    public function accountCheckout(){
        $id=request('_ptxn');
        $email=Auth::user()->email;
        return view('subscription.checkout',compact('id','email'));
    }
}
