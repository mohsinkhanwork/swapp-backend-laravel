<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index(){
        $logs=Activity::with('causer')->orderBy('id','desc')->paginate(50);
        return view('admin.logs.index',compact('logs'));
    }

    public function show(Activity $log){
        return view('admin.logs.single',compact('log'));
    }
}
