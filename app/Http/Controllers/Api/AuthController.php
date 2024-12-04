<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserStatus;
use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Mail\LoginOtpMail;
use App\Mail\ResetPassword;
use App\Mail\UserEmailVerification;
use App\Models\Newsletter;
use App\Models\Plan;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AuthController extends ApiController
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->errorResponse('Invalid Credentials',401);
        }
        $user = Auth::user();
        if($user->status==UserStatus::BANNED){
            return $this->errorResponse('Your account is permanently banned. please contact support team for more information',400);
        }
        if($user->status==UserStatus::HOLD){
            $banned_until=$user->banned_until->format('d M, Y');
            return $this->errorResponse("Your account is temporary banned until $banned_until. please contact support team for more information",400);
        }
        if(!$user->email_verified_at){
            $responseData = [
                'token' => null,
                'user' => new UserResource($user),
                'enable_2fa'=>false,
                'email_verified'=>false
            ];
            return $this->successResponse($responseData,"Please Verify your email address to continue.");
        }
        if($user->enable_2fa){
            $this->sendOtp($user);
            $responseData = [
                'token' => null,
                'user' => new UserResource($user),
                'enable_2fa'=>true,
                'email_verified'=>true
            ];
            return $this->successResponse($responseData,"Verification code is sent to your email address.");
        }
        $user->load('skills');
        // Revoke old tokens
        $user->tokens()->delete();

        $token = $user->createToken('New Token')->plainTextToken;
        $responseData = [
            'token' => $token,
            'user' => new UserResource($user),
            'enable_2fa'=>false,
            'email_verified'=>true
        ];

        return $this->successResponse($responseData,'Login Successfully');
    }

    public function verifyLoginCode(Request $request){
        $request->validate([
            'email'=>'required',
            'code'=>'required',
        ]);
        $user=User::whereEmail($request->email)->where('two_fa_code',$request->code)->first();
        if(!$user){
            return $this->errorResponse('Invalid Code',400);
        }
        $user->two_fa_code=null;
        $user->save();
        $user->load('skills');
        // Revoke old tokens
        $user->tokens()->delete();

        $token = $user->createToken('New Token')->plainTextToken;
        $responseData = [
            'token' => $token,
            'user' => new UserResource($user),
        ];

        return $this->successResponse($responseData,'Login Successfully');
    }

    public function socialLogin(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'provider'=>'required',
            'provider_id'=>'required',
        ]);

        $socialAccount = SocialAccount::where('provider_id',$request->provider_id)->where('provider',$request->provider)->first();

        if ($socialAccount){
            $user = User::find($socialAccount->user_id);
        }else{
            if(User::where('email',$request->email)->first()){
                return $this->errorResponse('User Already Registered with this email using password.',400);
            }
            $request->validate([
                'username' => ['required', 'string', 'regex:/^[a-zA-Z0-9_]*$/','unique:users,username'],
                'profession_id'=>['required','exists:professions,id'],
                'skills'=>['required','array'],
                'skills.*'=>'exists:skills,id',
                'bio'=>'required'
            ]);
            $free_plan=Plan::whereType('free')->first();
            $user = User::create([
                'first_name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->provider_id,
                'username'=>$request->username,
                'profession_id'=>$request->profession_id,
                'bio'=>$request->bio,
                'plan_id'=>$free_plan->id,
                'email_verified_at'=>now()
            ]);
            $user->skills()->attach($request->skills);

            SocialAccount::create([
                'provider_id' => $request->provider_id,
                'provider' => $request->provider,
                'user_id' => $user->id
            ]);
            $this->registerNewsletter($request->name,$request->email,true);
        }

        $user->load('skills');
        // Revoke old tokens
        $user->tokens()->delete();

        $token = $user->createToken('New Token')->plainTextToken;
        $responseData = [
            'token' => $token,
            'user' => new UserResource($user),
        ];

        return $this->successResponse($responseData,'Login Successfully');
    }

    public function register(Request $request){
        $data=$request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'username' => ['required', 'string', 'regex:/^[a-zA-Z0-9_]*$/','unique:users,username'],
            'phone'=>['required','unique:users,phone'],
            'email'=>['required','unique:users,email'],
            'password'=>['required','confirmed'],
            'avatar'=>'nullable',
            'profession_id'=>['required','exists:professions,id'],
            'skills'=>['required','array'],
            'skills.*'=>'exists:skills,id',
            'bio'=>'required',
            'country_id'=>'nullable',
        ]); 
        if($file=$request->file('avatar')){
            $imagePath = $file->storePublicly('avatars', 's3');
            $data['avatar'] = Storage::disk('s3')->url($imagePath);
        }

        $data['email_verification_token']=Str::random(40);
        // assign free plan on register
        $free_plan=Plan::whereType('free')->first();
        $data['plan_id']=$free_plan->id;
        $user = User::create($data);

        $user->skills()->attach($data['skills']);
        $this->registerNewsletter($user->name,$request->email,false);

        Mail::to($user->email)->send(new UserEmailVerification($user->email_verification_token));
        return $this->successResponse(['user'=>new UserResource($user)],'Account Created Successfully. Please Verify Your Email to continue');
    }

    public function sendForgetPasswordLink(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        $email=$request->email;
        $user=User::where('email',$email)->first();
        if(!$user){
            return $this->errorResponse('No account found with this email.',404);
        }
        $token=DB::table('password_reset_tokens')->where('email',$email)->first();
        if($token){
            Mail::to($email)->send(new ResetPassword($token->token));
        }else{
            $token=Str::random(40);
            DB::table('password_reset_tokens')->insert(['token'=>$token,'email'=>$email]);
            Mail::to($email)->send(new ResetPassword($token));
        }
        return $this->successResponse(null,'Please check your email. We send you a password reset link.');
    }

    public function resendEmailVerification(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        $user=User::whereEmail($request->email)->first();
        if(!$user){
            return $this->errorResponse("User doesn't exist with this email address.",404);
        }
        $user->email_verification_token=Str::random(40);
        $user->save();
        Mail::to($user->email)->send(new UserEmailVerification($user->email_verification_token));
        return $this->successResponse(null,'Check your email. We send you a email verification link.');
    }
    private function registerNewsletter($name,$email,$subscribed){
        Newsletter::firstOrCreate([
            'email'=>$email,
        ],[
            'name'=>$name,
            'subscribed'=>true,
            'email_verified_at'=>$subscribed?now():null
        ]);
    }
    private function sendOtp(User $user){
        $otp = rand(100000,999999);
        $user->update(['two_fa_code'=>$otp]);
        Mail::to($user)->send(new LoginOtpMail($otp));
    }
}