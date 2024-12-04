<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use App\Mail\AdvertiserResetPassword;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm(){
        return view('auth.advertiser.password.email');
    }

    public function sendResetLinkEmail(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        $email=$request->email;
        $user=Advertiser::where('email',$email)->first();
        if(!$user){
            return redirect()->back()->withErrors(['No account found with this email.']);
        }
        $token=DB::table('password_reset_tokens')->where('email',$email)->whereType('advertiser')->first();
        if($token){
            Mail::to($email)->send(new AdvertiserResetPassword($token->token));
        }else{
            $token=Str::random(40);
            DB::table('password_reset_tokens')->insert(['token'=>$token,'email'=>$email,'type'=>'advertiser']);
            Mail::to($email)->send(new AdvertiserResetPassword($token));
        }
        return redirect()->back()->with('success','Please check your email. We send you a password reset link.');
    }

    public function showResetForm($token){
        $token=DB::table('password_reset_tokens')->where('token',$token)->whereType('advertiser')->first();
        if(!$token){
            return redirect()->route('advertiser.showLogin')->withErrors(['Invalid Password Reset Link']);
        }
        $email=$token->email;
        $token=$token->token;
        return view('auth.advertiser.password.confirm',compact('token','email'));
    }

    public function reset(Request $request){
        $request->validate([
            'password'=>['required','confirmed','min:8'],
            'token'=>'required',
        ]);
        $password=$request->password;
        $token=DB::table('password_reset_tokens')->where('token',$request->token)->whereType('advertiser')->first();
        if(!$token){
            return redirect()->route('advertiser.showLogin')->withErrors(['Invalid Password Reset Link']);
        }
        $user=Advertiser::whereEmail($token->email)->first();
        $user->update(['password'=>bcrypt($password)]);
        DB::table('password_reset_tokens')->where('token',$token->token)->delete();
        Auth::guard('advertiser')->login($user);
        return redirect()->route('advertiser.dashboard');
    }
}
