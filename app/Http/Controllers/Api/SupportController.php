<?php

namespace App\Http\Controllers\Api;

use App\Enums\SupportStatus;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportTicketResource;
use App\Http\Resources\SupportTicketResponseResource;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SupportController extends ApiController
{
    public function tickets(){
        $user=Auth::user();
        $status=request('status','open');
        if ($status=='solved') {
            $tickets=$user->supportTickets()->whereStatus(SupportStatus::SOLVED)->latest()->get();
        }else{
            $tickets=$user->supportTickets()->where('status','!=',SupportStatus::SOLVED)->latest()->get();
        }
        return $this->successResponse(SupportTicketResource::collection($tickets));
    }

    public function createTicket(Request $request){
        $data=$request->validate([
            'subject'=>'required',
            'description'=>'required',
            'file'=>'nullable'
        ]);
        $user=Auth::user();
        if($file=$request->file('file')){
            $imagePath = $file->storePublicly('support-tickets', 's3');
            $data['file'] = Storage::disk('s3')->url($imagePath);
        }
        $data['priority']=SupportStatus::NORMAL_PRIORITY;
        if($user->plan->priority_support){
            $data['priority']=SupportStatus::URGENT_PRIORITY;
        }
        $ticket=$user->supportTickets()->create($data);


        notifyAdmin(
            ['id'=>$ticket->ticket_number,'type'=>'support-ticket','title'=>'New Support Ticket','description'=>'User created a new support ticket'],
            'support'
        );
        return $this->successResponse(null,'Ticket Created Successfully');
    }

    public function ticketReplies(SupportTicket $ticket){
        $replies=$ticket->responses()->get();
        return $this->successResponse([
            'ticket'=>new SupportTicketResource($ticket),
            'replies'=>SupportTicketResponseResource::collection($replies)
        ]);
    }

    public function replyTicket(Request $request, SupportTicket $ticket){
        $data=$request->validate([
            'description'=>'required',
            'file'=>'nullable'
        ]);
        $user=Auth::user();
        if($ticket->ticketable_id!=$user->id){
            return abort(403);
        }
        if($file=$request->file('file')){
            $imagePath = $file->storePublicly('support-tickets', 's3');
            $data['file'] = Storage::disk('s3')->url($imagePath);
        }
        $ticket->status=SupportStatus::WAITING_REPLY;
        $ticket->save();
        $data['sender_type']='user';
        $reply=$ticket->responses()->create($data);

        notifyAdmin(
            ['id'=>$ticket->ticket_number,'type'=>'support-ticket','title'=>'Support Ticket Reply','description'=>'User replied on a support ticket'],
            'support'
        );
        return $this->successResponse(new SupportTicketResponseResource($reply),'Replied Successfully');
    }

    public function solveTicket(SupportTicket $ticket){
        $user=Auth::user();
        if($ticket->user_id!=$user->id){
            return abort(403);
        }
        $ticket->status=SupportStatus::SOLVED;
        $ticket->save();

        notifyAdmin(
            ['id'=>$ticket->ticket_number,'type'=>'support-ticket','title'=>'Support Ticket Closed','description'=>'User marked support ticket completed'],
            'support'
        );
        return $this->successResponse(null,'Ticket marked as solved');
    }
}
