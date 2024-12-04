<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\LoginOtpMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLogin(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $admin=Admin::whereEmail($request->email)->first();
        if(!$admin){
            return redirect()->back()->withErrors(['No Account found with this email.'])->withInput();
        }
        if(Hash::check($request->password,$admin->password)){
            if($admin->enable_2fa){
                $this->sendOtp($admin->email);
                return redirect()->route('admin.otp-verification');
            }
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors(['Invalid Credentials.'])->withInput();
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.showLogin');
    }

    public function showVerifyCode(){
        if(Auth::guard('admin')->check() || empty(session()->get('otp'))){
            return redirect()->route('admin.showLogin');
        }
        return view('auth.admin.otp-verification');
    }

    public function verifyLoginCode(Request $request){
        $request->validate([
            'code' => 'required'
        ]);

        $otp=session()->get('otp');
        $email=session()->get('login-email');
        if($otp==$request->code){
            session()->forget('otp','login-email');
            $user=Admin::whereEmail($email)->first();
            if($user){
                Auth::guard('admin')->login($user);
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('admin.showLogin');
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
