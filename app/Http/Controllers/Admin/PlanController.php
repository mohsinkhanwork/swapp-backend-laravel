<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:plan-management,admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans=Plan::all();
        return view('admin.plans.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data= $request->validate([
            'title'=>'required',
            'type'=>'required',
            'monthly_price'=>'required',
            'monthly_price_id'=>'required',
            'yearly_price'=>'nullable',
            'yearly_price_id'=>'nullable',
            'description'=>'required',
            'monthly_swaps'=>'required',
            'retry_exam_duration'=>'required',
            'priority_support'=>'required',
            'show_ads'=>'required',
            'active'=>'required'
        ]);
        $plan=Plan::create($data);
        activity()->causedBy(auth()->user())->performedOn($plan)->withProperties($plan)->log('Admin added a new plan');
        return redirect()->route('admin.plans.index')->with('success','Plan Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan=Plan::findOrFail($id);
        return view('admin.plans.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->validate([
            'title'=>'required',
            'type'=>'required',
            'monthly_price'=>'required',
            'monthly_price_id'=>'required',
            'yearly_price'=>'nullable',
            'yearly_price_id'=>'nullable',
            'description'=>'required',
            'monthly_swaps'=>'required',
            'retry_exam_duration'=>'required',
            'priority_support'=>'required',
            'show_ads'=>'required',
            'active'=>'required'
        ]);
        $plan=Plan::findOrFail($id);
        $plan->update($data);
        activity()->causedBy(auth()->user())->performedOn($plan)->withProperties($plan->getChanges())->log('Admin updated a plan');
        return redirect()->route('admin.plans.index')->with('success','Plan Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan=Plan::findOrFail($id);
        if($plan->users()->count()>0){
            return redirect()->back()->with("error","Multiple users has this plan. You can't delete it. you can disable it for new users");
        }
        if($plan->type=='free'){
            return redirect()->back()->with('error',"You can't delete free plan.");
        }
        $plan->delete();
        activity()->causedBy(auth()->user())->performedOn($plan)->withProperties($plan)->log('Admin deleted a plan');
        return redirect()->back()->with('success','Plan Deleted Successfully');
    }
}
