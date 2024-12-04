<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertiserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:advertisers,admin');
    }

    public function index(){
        $advertisers=Advertiser::all();
        return view('admin.advertisers.index',compact('advertisers'));
    }

    public function updateStatus(Request $request, Advertiser $advertiser){
        $request->validate([
            'status'=>'required'
        ]);
        $advertiser->active=$request->status;
        $advertiser->save();
        activity()->causedBy(auth()->user())->performedOn($advertiser)->withProperties($advertiser->getChanges())->log('Admin updated advertiser account status');
        return $this->successResponse(null,'status updated successfully');
    }

    public function login(Advertiser $advertiser){
        Auth::guard('advertiser')->login($advertiser);
        return redirect()->route('advertiser.dashboard');
    }
}
