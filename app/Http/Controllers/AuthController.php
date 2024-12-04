<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function verifyUser($token){
        $user=User::where('email_verification_token',$token)->first();
        if(!$user){
            return redirect(config('app.frontend_url') . '/login');
        }
        $user->update([
            'email_verification_token'=>Null,
            'email_verified_at'=>Carbon::now()
        ]);
        Newsletter::whereEmail($user->email)->update(['email_verified_at'=>now()]);
        // create page to show success message
        return redirect(config('app.frontend_url') . '/login');
    }

    public function redirectUser($token,$path){
        $tk=PersonalAccessToken::findToken($token);
        $path=str_replace("--","/",$path);
        if($tk){
            Auth::login($tk->tokenable);
            return redirect($path);
        }
        abort(404);
    }
}
