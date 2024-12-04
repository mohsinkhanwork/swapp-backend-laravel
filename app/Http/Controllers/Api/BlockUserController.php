<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserListingResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockUserController extends ApiController
{
    public function block(Request $request){
        $request->validate([
            'user_id'=>'required'
        ]);
        $user=User::findOrFail($request->user_id);
        $u=$request->user();
        $blocked=$u->blockedUsers()->where('blocked_user_id',$user->id)->first();
        if($blocked || $u->id==$user->id){
            return $this->errorResponse('Already Block',400);
        }
        $u->blockedUsers()->attach($user->id);
        return $this->successResponse(null,'Blocked Successfully');
    }
    public function unblock(Request $request){
        $request->validate([
            'user_id'=>'required'
        ]);
        $user=User::findOrFail($request->user_id);
        $u=$request->user();
        $blocked=$u->blockedUsers()->where('blocked_user_id',$user->id)->first();
        if(!$blocked || $u->id==$user->id){
            return $this->errorResponse("You already unblocked $user->name.",400);
            // return $this->errorResponse('Already Block',400);
        }
        $u->blockedUsers()->detach($user->id);
        return $this->successResponse(null,'unblocked Successfully');
    }

    public function blockedUsers(){
        $user=Auth::user();
        $search=request('search','');
        $users=$user->blockedUsers()
                    ->where('users.id','!=',$user->id)
                    ->when($search!='',function($qry) use($search){
                        $qry->where(function($query) use($search){
                            $query->where('first_name','like',"%$search%")
                                ->orWhere('last_name','like',"%$search%")
                                ->orWhere('email','like',"%$search%")
                                ->orWhere('username','like',"%$search%")
                                ->orWhereHas('profession', function ($professionQuery) use ($search) {
                                    $professionQuery->where('title_en', 'like', "%$search%");
                                });
                        });
                    })
                    ->paginate(20);
        return $this->successResponse(new UserListingResource($users));
    }
}
