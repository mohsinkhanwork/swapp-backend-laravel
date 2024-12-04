<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SupportStatus;
use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Notifications\SupportReplyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:support,admin');
    }

    public function index(){
        $status=request('status','');
        $priority=request('priority','');
        $data=[];
        $tickets=SupportTicket::query();
        if($status!=''){
            $tickets->whereStatus($status);
        }
        if($priority!=''){
            $tickets->wherePriority($priority);
        }
        $data['tickets']=$tickets->get();
        $data['solved']=SupportTicket::whereStatus(SupportStatus::SOLVED)->count();
        $data['process']=SupportTicket::whereStatus(SupportStatus::PROCESS)->count();
        $data['answered']=SupportTicket::whereStatus(SupportStatus::ANSWERED)->count();
        $data['waiting_reply']=SupportTicket::whereStatus(SupportStatus::WAITING_REPLY)->count();
        return view('admin.support.index',$data);
    }

    public function showTicket(SupportTicket $ticket){
        return view('admin.support.single',compact('ticket'));
    }

    public function reply(Request $request, SupportTicket $ticket){
        $data=$request->validate([
            'description'=>'required',
            'file'=>'nullable',
            'solved'=>['required','in:0,1']
        ]);
        if($file=$request->file('file')){
            $imagePath = $file->storePublicly('support-tickets', 's3');
            $data['file'] = Storage::disk('s3')->url($imagePath);
        }
        $data['sender_type']='support';
        $data['admin_id']=Auth::guard('admin')->id();
        $ticket_response=$ticket->responses()->create($data);
        if ($request->solved) {
            $ticket->status=SupportStatus::SOLVED;
        } else {
            $ticket->status=SupportStatus::ANSWERED;
        }

        $ticket->save();
        $data=[
            'id'=>$ticket->ticket_number,
            'type'=>'support-ticket',
            'title'=>"New Support Reply",
            'description'=>"Support replied to your created ticket."
        ];
        $ticket_response->ticket_status=$ticket->status;
        activity()->causedBy(auth()->user())->performedOn($ticket_response)->withProperties($ticket_response)->log('Admin replied to a support ticket');
        $ticket->ticketable->notify(new SupportReplyNotification($data,$request->description));
        return redirect()->back()->with('success','Replied Successfully');
    }
}
