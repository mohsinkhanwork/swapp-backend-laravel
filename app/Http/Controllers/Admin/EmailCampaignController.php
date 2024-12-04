<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailCampaign;
use App\Models\Newsletter;
use App\Notifications\EmailCampaignNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class EmailCampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:email-campaigns,admin');
    }
    public function index(){
        $compaigns=EmailCampaign::all();
        return view('admin.email-campaigns.index',compact('compaigns'));
    }

    public function show(EmailCampaign $compaign){
        return view('admin.email-campaigns.single',compact('compaign'));
    }

    public function create(){
        $active_users=Newsletter::where('subscribed',1)->count();
        return view('admin.email-campaigns.create',compact('active_users'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'subject'=>'required',
            'body'=>'required'
        ]);
        $active_users=Newsletter::where('subscribed',1)->count();
        $data['admin_id']=Auth::guard('admin')->id();
        $data['users_reached']=$active_users;
        $users=Newsletter::where('subscribed',1)->select('email','id')->get();
        if($users->count()>=100){
            $users->chunk(100, function ($chunk) use ($data){
                Notification::send($chunk, new EmailCampaignNotification($data));
            });
        }else{
            Notification::send($users, new EmailCampaignNotification($data));
        }
        $campaign=EmailCampaign::create($data);

        activity()->causedBy(auth()->user())->performedOn($campaign)->withProperties($campaign)->log('Admin added a new email campaign');
        return redirect()->route('admin.email-campaigns.index')->with('success','Email Campaign successfully sent to subscribers');
    }
}
