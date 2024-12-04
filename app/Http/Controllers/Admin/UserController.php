<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Country;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users,admin');
    }

    /**
     * @return View
     */
    public function index() : View
    {

        $users = User::with('skills', 'plan')
            ->withAvg('swapDetails as avg_rating', 'rating')
            ->withCount(['swapDetails as rating_count' => function ($query) {
                $query->whereNotNull('rating');
            }]);

        // Skill filter
        if (request()->has('skill') && request('skill') != '') {
            $users = $users->whereHas('skills', function ($query) {
                $query->where('skills.id', request('skill'));
            });
        }
        $countries = Country::select('id', 'name')->get();
        // Collecting status conditions
        $statusConditions = [];
        if (request()->has('banned')) {
            $statusConditions[] = 'banned';
        }
        if (request()->has('hold')) {
            $statusConditions[] = 'hold';
        }

        // Apply status filters if any
        if (!empty($statusConditions)) {
            $users = $users->whereIn('status', $statusConditions);
        }

        $users = $users->get();
        $skills = Skill::all();
        return view('admin.users.index',compact('users', 'skills', 'countries'));
    }

    public function banAccount(User $user){
        $user->status=UserStatus::BANNED;
        $user->save();
        activity()->causedBy(auth()->user())->performedOn($user)->withProperties($user)->log('Admin Banned user account permanently.');
        return redirect()->back()->with('success','User account is banned permanently');
    }

    public function holdAccount(Request $request, User $user){
        $request->validate([
            'date'=>'required'
        ]);
        $user->status=UserStatus::HOLD;
        $user->banned_until=$request->date;
        $user->save();
        activity()->causedBy(auth()->user())->performedOn($user)->withProperties($user->getChanges())->log('Admin Hold user account temporarily.');
        return redirect()->back()->with('success','User account is temporarily banned for given duration.');
    }
}
