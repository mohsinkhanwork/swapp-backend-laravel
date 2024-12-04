<?php

namespace App\Http\Controllers\Advertiser;

use App\Enums\SupportStatus;
use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Ticket;

class SupportController extends Controller
{
    public function index(){
        $advertiser=Auth::guard('advertiser')->user();
        $status=request('status','');
        $tickets=$advertiser->supportTickets()->when($status!='',function($qry) use ($status){
            if($status=='solved'){
                $qry->whereStatus(SupportStatus::SOLVED);
            }else{
                $qry->where('status','!=',SupportStatus::SOLVED);
            }
        })->get();
        return view('advertiser.support.index',compact('tickets'));
    }

    public function createTicket(){
        return view('advertiser.support.create-ticket');
    }

    public function show(SupportTicket $ticket){
        if(Auth::guard('advertiser')->user()->id!=$ticket->ticketable_id){
            return abort(403);
        }
        return view('advertiser.support.single',compact('ticket'));
    }

    public function storeTicket(Request $request){
        $data=$request->validate([
            'subject'=>'required',
            'description'=>'required',
            'file'=>'nullable'
        ]);
        $advertiser=Auth::guard('advertiser')->user();
        if($file=$request->file('file')){
            $imagePath = $file->storePublicly('support-tickets', 's3');
            $data['file'] = Storage::disk('s3')->url($imagePath);
        }
        $data['priority']=SupportStatus::NORMAL_PRIORITY;
        $ticket=$advertiser->supportTickets()->create($data);

        notifyAdmin(
            ['id'=>$ticket->ticket_number,'type'=>'support-ticket','title'=>'New Support Ticket','description'=>'Advertiser created a new support ticket'],
            'support'
        );
        return redirect()->route('advertiser.support.index')->with('success','Support Ticket Created Successfully');
    }

    public function reply(Request $request,SupportTicket $ticket){
        $data=$request->validate([
            'description'=>'required',
            'file'=>'nullable',
            'solved'=>['required','in:0,1']
        ]);
        $user=Auth::guard('advertiser')->user();
        if($ticket->ticketable_id!=$user->id){
            return abort(403);
        }
        if($file=$request->file('file')){
            $imagePath = $file->storePublicly('support-tickets', 's3');
            $data['file'] = Storage::disk('s3')->url($imagePath);
        }
        if ($request->solved) {
            $ticket->status=SupportStatus::SOLVED;
        } else {
            $ticket->status=SupportStatus::WAITING_REPLY;
        }
        $ticket->save();
        $data['sender_type']='user';
        $reply=$ticket->responses()->create($data);

        notifyAdmin(
            ['id'=>$ticket->ticket_number,'type'=>'support-ticket','title'=>'Support Ticket Reply','description'=>'Advertiser replied on a support ticket'],
            'support'
        );
        return redirect()->back()->with('success','Replied to ticket successfully');
    }
}
