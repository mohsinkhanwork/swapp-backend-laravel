<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use App\Mail\AdvertiserEmailVerification;
use App\Mail\LoginOtpMail;
use App\Models\Advertiser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function showLogin(){
        if(Auth::guard('advertiser')->check()){
            return redirect()->route('advertiser.dashboard');
        }
        return view('auth.advertiser.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $advertiser=Advertiser::whereEmail($request->email)->first();
        if(!$advertiser){
            return redirect()->back()->withErrors(['No Account found with this email.'])->withInput();
        }
        if(Hash::check($request->password,$advertiser->password)){
            if(!$advertiser->active){
                return redirect()->back()->withErrors(['Your account is deactivated. please contact support team for more information.'])->withInput();
            }
            if(!$advertiser->email_verified_at){
                return redirect()->back()->withErrors(['Please verify your email address to continue.'])->withInput();
            }
            if($advertiser->enable_2fa){
                $this->sendOtp($advertiser->email);
                return redirect()->route('advertiser.otp-verification');
            }
            Auth::guard('advertiser')->login($advertiser);
            return redirect()->route('advertiser.dashboard');
        }
        return redirect()->back()->withErrors(['Invalid Credentials.'])->withInput();
    }

    public function showRegister(){
        if(Auth::guard('advertiser')->check()){
            return redirect()->route('advertiser.dashboard');
        }
        return view('auth.advertiser.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>['required','unique:advertisers,email'],
            'password'=>['required','min:8']
        ]);
        $data = $request->only('name','email','password');
        $data['email_verification_token']=Str::random(40);
        $user = Advertiser::create($data);
        Mail::to($user->email)->send(new AdvertiserEmailVerification($user->email_verification_token));
        return redirect()->back()->with('success','Account created successfully. Please verify your email address to continue.');
    }

    public function logout(){
        Auth::guard('advertiser')->logout();
        return redirect()->route('advertiser.showLogin');
    }

    public function showVerifyCode(){
        if(Auth::guard('advertiser')->check() || empty(session()->get('otp'))){
            return redirect()->route('advertiser.showLogin');
        }
        return view('auth.advertiser.otp-verification');
    }

    public function verifyAdvertiser($token){
        $advertiser=Advertiser::where('email_verification_token',$token)->first();
        if(!$advertiser){
            return redirect()->route('advertiser.showLogin');
        }
        $advertiser->update([
            'email_verification_token'=>Null,
            'email_verified_at'=>Carbon::now()
        ]);
        Auth::guard('advertiser')->login($advertiser);
        return redirect()->route('advertiser.dashboard');
    }

    public function verifyLoginCode(Request $request){
        $request->validate([
            'code' => 'required'
        ]);

        $otp=session()->get('otp');
        $email=session()->get('login-email');
        if($otp==$request->code){
            session()->forget('otp','login-email');
            $user=Advertiser::whereEmail($email)->first();
            if($user){
                Auth::guard('advertiser')->login($user);
                return redirect()->route('advertiser.dashboard');
            }
            return redirect()->route('advertiser.showLogin');
        }else{
            return redirect()->back()->withErrors(['Invalid Code']);
        }
    }

    private function sendOtp($email){
        $otp = rand(100000,999999);
        session()->put('otp',$otp);
        session()->put('login-email',$email);
        Mail::to($email)->send(new LoginOtpMail($otp));
    }
}
