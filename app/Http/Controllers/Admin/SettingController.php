<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings,admin');
    }

    public function index(){
        $settings=Setting::all();
        return view('admin.settings.index',compact('settings'));
    }

    public function update(Request $request){
        $request->validate([
            'key'=>['required'],
            'value'=>'required',
        ]);
        Setting::where('key',$request->key)->update(['value'=>$request->value]);
        if($request->type=='checkbox'){
            return $this->successResponse(null,'Setting updated successfully');
        }
        return redirect()->back()->with('success','Setting updated successfully.');
    }
}
