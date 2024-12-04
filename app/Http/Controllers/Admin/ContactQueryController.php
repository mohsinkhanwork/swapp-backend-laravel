<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactQueryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact-queries,admin');
    }
    public function index(){
        $status=request('status',0);
        $queries=ContactUs::where('seen',$status)->get();
        return view('admin.contact-queries.index',compact('queries'));
    }

    public function markRead(ContactUs $query){
        $query->update(['seen'=>true]);
        activity()->causedBy(auth()->user())->performedOn($query)->withProperties($query)->log('Admin updated a contact query');
        return redirect()->back()->with('success','Marked as read successfully');
    }
}
