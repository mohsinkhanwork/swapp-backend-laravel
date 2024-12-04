<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:newsletter,admin');
    }

    public function index(){
        $status=request('status','');
        $subscribers=Newsletter::when($status!='',function($qry) use($status){
            $qry->where('subscribed',$status);
        })->get();
        return view('admin.newsletter.index',compact('subscribers'));
    }
}
