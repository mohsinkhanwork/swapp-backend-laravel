<?php

namespace App\Http\Controllers\Api;

use App\Models\Chat;
use App\Models\Swap;
use App\Models\User;
use App\Models\Skill;
use App\Models\SwapUser;
use App\Enums\SwapStatus;
use App\Models\SkillUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\SwapResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Http\Resources\SwapUserResource;
use App\Http\Resources\AllRequestsResource;
use App\Http\Resources\CommonSkillResource;
use App\Notifications\SwapRequestNotification;
use App\Http\Resources\SwapRequestsSentResource;
use App\Http\Resources\SwapRequestsReceivedResource;
use App\Notifications\SwapRequestAcceptedNotification;
use App\Notifications\SwapRequestRejectedNotification;

class SwapController extends ApiController
{

    public function swapSkillRequest(Request $request)
    {
        $validator = $request->validate([
            'user_id' => 'required',
            'skill_id' => 'required',
            'proposal' => 'required'
        ]);
        if (!$validator) {
            return response()->json(['all requests' => $request->all()], 422);
        }
        try {
            $auth_user = Auth::user();
            $user = User::findOrFail($request->user_id);
            $skill = Skill::findOrFail($request->skill_id);
            $user_skill = $user->skills()->where('skill_id', $skill->id)->where('status', 1)->first();
            if (!$user_skill) {
                return $this->errorResponse('You can only send requests for approved skills', 400);
            }
            $monthly_swaps = $auth_user->plan->monthly_swaps;
            $current_month_swaps = $auth_user->swaps()->where('swaps.status', '!=', SwapStatus::REJECTED)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
            if ($current_month_swaps >= $monthly_swaps) {
                return $this->errorResponse('Your monthly swap limit exceeded. upgrade to premium plan for more swaps.', 400);
            }
            $user_swap = Swap::where('user_id', $auth_user->id)->whereHas('users', function ($qry) use ($user, $skill) {
                $qry->where('user_id', $user->id)->where('skill_id', $skill->id);
            })->where('swaps.status', SwapStatus::PENDING)->first();
            if ($user_swap) {
                return $this->errorResponse('You already send swap request for this skill to the user. please wait for user response.', 400);
            }
            DB::beginTransaction();
            $swap = Swap::create([
                'user_id' => Auth::id(),
                'proposal' => $request->proposal,
                'status' => SwapStatus::PENDING
            ]);
            $swap->users()->attach($user->id, [
                'skill_id' => $skill->id,
                'status' => SwapStatus::PENDING
            ]);
            // $swap->users()->attach($auth_user->id, [
            //     'skill_id' => $skill->id,
            //     'status' => SwapStatus::PENDING
            // ]);
            $data = [
                'id' => $swap->id,
                'type' => 'swap-request',
                'title' => 'New Swap Request',
                'description' => Auth::user()->name . ' send you a swap request for ' . $skill->title_en . ' skill',
                'image' => Auth::user()->avatar
            ];
            $user->notify(new SwapRequestNotification(Auth::user()->name, $skill->title_en, $data));

            $this->startChat($swap, $user, $auth_user);

            DB::commit();
            return $this->successResponse(new SwapRequestsSentResource($swap), "Swap request successfully sent to the user.");
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }

    public function acceptSwapSkillRequest(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'swap_id'=>'required',
        //     'skill_id'=>'required',
        //     'description'=>'required'
        // ]);
        // try {
        //     $user=Auth::user();
        //     $swap=Swap::findOrFail($request->swap_id);
        //     $user_swap=$user->swaps()->where('swap_id',$swap->id)->where('swaps.status',SwapStatus::PENDING)->first();
        //     if(!$user_swap){
        //         return $this->errorResponse('Invalid swap request',400);
        //     }
        //     $skill=Skill::findOrFail($request->skill_id);
        //     $requester_user=$swap->requester;
        //     $user_skill=$requester_user->skills()->where('skill_id',$skill->id)->where('status',1)->first();
        //     // $user_skill=SkillUser::where('user_id', $requester_user->id)->where('skill_id',$skill->id)->where('status',1)->first();
        //     // dd($user_skill);
        //     if(!$user_skill){
        //         return $this->errorResponse('Invalid skill selected from user profile',400);
        //     }
        //     $swap->users()->attach($requester_user->id,[
        //         'skill_id'=>$skill->id,
        //         'status'=>SwapStatus::PENDING
        //     ]);
        //     $swap->response=$request->description;
        //     $swap->status=SwapStatus::PROGRESS;
        //     $swap->save();
        //     // start chat
        //     $this->startChat($swap);
        //     // notify requester
        //     $data=[
        //         'id'=>$swap->id,
        //         'title'=>'Swap Request Accepted',
        //         'description'=>Auth::user()->name.' accepted your swap request for in exchange for '.$skill->title_en.' skill',
        //         'image'=>Auth::user()->avatar,
        //         'type'=>'swap-request'
        //     ];
        //     $requester_user->notify(new SwapRequestAcceptedNotification($user->name,$skill->title_en,$data));
        //     return $this->successResponse(new SwapResource($swap),'Swap Request Accepted');
        // } catch (\Throwable $th) {
        //     return $this->serverException($th);
        // }
        $request->validate([
            'swap_id' => 'required',
            'description' => 'required'
        ]);
        try {
            $user = Auth::user();
            $swap = Swap::findOrFail($request->swap_id);
            $user_swap = $user->swaps()->where('swap_id', $swap->id)->where('swaps.status', SwapStatus::PENDING)->first();
            if (!$user_swap) {
                return $this->errorResponse('Invalid swap request', 400);
            }
            $swap->response = $request->description;
            $swap->status = SwapStatus::PROGRESS;
            $swap->save();
            $requester_user = $swap->requester;
            $data = [
                'id' => $swap->id,
                'title' => 'Swap Request In Progress',
                'description' => Auth::user()->name . ' accepted your skill swap request',
                'image' => Auth::user()->avatar,
                'type' => 'swap-request'
            ];
            $requester_user->notify(new SwapRequestRejectedNotification($user->name, $swap->response));
            return $this->successResponse(null, 'Swap Request Accepted');
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }
    public function rejectSwapSkillRequest(Request $request)
    {
        $request->validate([
            'swap_id' => 'required',
            'reject_reason' => 'required',
            'description' => 'required'
        ]);
        try {
            $user = Auth::user();
            $swap = Swap::findOrFail($request->swap_id);
            $user_swap = $user->swaps()->where('swap_id', $swap->id)->where('swaps.status', SwapStatus::PENDING)->first();
            if (!$user_swap) {
                return $this->errorResponse('Invalid swap request', 400);
            }
            $swap->response = $request->description;
            $swap->reject_reason = $request->reject_reason;
            $swap->status = SwapStatus::REJECTED;
            $swap->save();
            $requester_user = $swap->requester;
            $data = [
                'id' => $swap->id,
                'title' => 'Swap Request Rejected',
                'description' => Auth::user()->name . ' rejected your skill swap request',
                'image' => Auth::user()->avatar,
                'type' => 'swap-request'
            ];
            $requester_user->notify(new SwapRequestRejectedNotification($user->name, $swap->response));
            return $this->successResponse(null, 'Swap Request Rejected');
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }

    public function allRequests()
    {
        // //sent requests
        // $user=Auth::user();
        // $userSwaps = Swap::where('user_id', $user->id)->pluck('id')->toArray();
        // $swaps = SwapUser ::whereIn('swap_id', $userSwaps)->with('user','skill')->get();
        // //received requests
        // $receivedSwaps=$user->swaps()->with('swapUsers','swapUsers.skill','requester')->get();
        // $data = [
        //     'swaps' => SwapRequestsSentResource::collection($swaps),
        //     'swapUsers' => SwapRequestsReceivedResource::collection($receivedSwaps)
        // ];
        // return $this->successResponse($data);
        $user = Auth::user();
        // Sent requests
        $userSwaps = Swap::where('user_id', $user->id)->pluck('id')->toArray();
        $sentSwaps = SwapUser::whereIn('swap_id', $userSwaps)
            ->with('user', 'skill')
            ->get();
        // Received requests
        $receivedSwaps = $user->swaps()
            ->with('swapUsers', 'swapUsers.skill', 'requester')
            ->get();
        $data = [
            'sentSwaps' => SwapRequestsSentResource::collection($sentSwaps),
            'receivedSwaps' => SwapRequestsReceivedResource::collection($receivedSwaps)
        ];
        return $this->successResponse($data);
    }
    public function receivedRequests()
    {
        $user = Auth::user();
        $swaps = $user->swaps()->with('swapUsers', 'swapUsers.skill', 'requester')->where('swaps.status', SwapStatus::PENDING)->get();
        // dd($swaps);
        return $this->successResponse(SwapRequestsReceivedResource::collection($swaps));
    }
    public function sentRequests()
    {
        $user = Auth::user();
        $status = request('status', SwapStatus::PENDING);
        $userSwaps = Swap::where('user_id', $user->id)->where('status', $status)->pluck('id')->toArray();
        $swaps = SwapUser::whereIn('swap_id', $userSwaps)->with('user', 'skill')->get();
        return $this->successResponse(SwapRequestsSentResource::collection($swaps));
    }

    public function swaps()
    {
        $user = Auth::user();
        $swaps = $user->swaps()->whereNotIn('swaps.status', [SwapStatus::PENDING, SwapStatus::REJECTED])->pluck('swap_id')->toArray();
        $swaps = Swap::whereIn('id', $swaps)->with('swapUsers', 'swapUsers.skill', 'swapUsers.user')->get();
        return $this->successResponse(SwapResource::collection($swaps));
    }
    public function mySwaps()
    {
        try {
            $user = Auth::user();
            $swaps = SwapUser::where('user_id', $user->id)->pluck('swap_id')->toArray();
            $swaps = Swap::whereIn('id', $swaps)->with('swapUsers', 'swapUsers.skill', 'swapUsers.user')->get();
            return $this->successResponse(SwapResource::collection($swaps));
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }
    private function startChat(Swap $swap, $user1, $user2)
    {
        $chat = Chat::create(['swap_id' => $swap->id]);
        // $users = $swap->users()->pluck('user_id')->toArray();
        $chat->users()->attach([$user1->id, $user2->id]);
    }
    public function commonSwapSkills($userId)
    {
        $user = Auth::user();
        $skillArray = SkillUser::where('user_id', $userId)
            // ->orWhere('user_id', $user->id)
            ->pluck('skill_id')
            ->toArray();
        $commonSkills = Skill::whereIn('id', $skillArray)->get();
        return $this->successResponse(CommonSkillResource::collection($commonSkills));
    }

    public function updateRating(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'swap_id' => 'required|integer',
                'rating' => 'required|numeric|min:0|max:5', // Assuming rating is between 0 and 5
            ]);

            $swapUserId = $request->input('swap_id');
            $rating = $request->input('rating');

            // Find the SwapUser record
            $swapUser = SwapUser::findOrFail($swapUserId);

            // Temporarily disable timestamp updates
            $swapUser->timestamps = false;

            // Update the rating
            $swapUser->rating = $rating;

            // Save the record without updating the updated_at column
            $swapUser->update(['rating' => $rating]);

            // Restore timestamp updates
            $swapUser->timestamps = true;

            return response()->json(['message' => 'Rating updated successfully'], 200);
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }

    public function updateReview(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'swap_id' => 'required|integer',
                'review' => 'nullable|string', // Review can be null or a string
            ]);

            $swapUserId = $request->input('swap_id');
            $review = $request->input('review'); // This will be null if not provided

            // Find the SwapUser record
            $swapUser = SwapUser::findOrFail($swapUserId);

            // Temporarily disable timestamp updates
            $swapUser->timestamps = false;

            // Update the review field only
            $swapUser->review = $review;

            // Save the record without updating the updated_at column
            $swapUser->save();

            // Restore timestamp updates
            $swapUser->timestamps = true;

            return response()->json(['message' => 'Review updated successfully'], 200);
        } catch (\Throwable $th) {
            return $this->serverException($th);
        }
    }

    public function allParticipants()
    {
        $user = Auth::user();
        // Sent requests
        $userSwaps = Swap::where('user_id', $user->id)->pluck('id')->toArray();
        $sentSwaps = SwapUser::whereIn('swap_id', $userSwaps)
            ->where('status', 'progress')
            ->with('user', 'skill')
            ->get();
        // Received requests
        $receivedSwaps = $user->swaps()
            ->with('swapUsers', 'swapUsers.skill', 'requester')
            ->get();

        $data = SwapRequestsSentResource::collection($sentSwaps)->merge(SwapRequestsReceivedResource::collection($receivedSwaps));
        $data = [
            'swaps' => $data->toArray()
        ];

        return $this->successResponse($data);
    }
}
