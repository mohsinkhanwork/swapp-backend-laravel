<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Swap;
use Illuminate\Http\Request;

class SwapController extends Controller
{
    public function index(){
        $swaps=Swap::with('swapUsers','swapUsers.user','swapUsers.skill','requester')->get();
        return view('admin.swaps.index',compact('swaps'));
    }

    public function show(Swap $swap){
        return view('admin.swaps.single',compact('swap'));
    }
}
