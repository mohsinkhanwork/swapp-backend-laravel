<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdPackage;
use Illuminate\Http\Request;

class AdPackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:advertiser-plans,admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages=AdPackage::all();
        return view('admin.ad-packages.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $package=AdPackage::findOrFail($id);
        return view('admin.ad-packages.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'title'=>'required',
            'price'=>'required',
            'price_id'=>'required',
            'duration'=>'required',
        ]);
        $package=AdPackage::findOrFail($id);
        $package->update($data);
        activity()->causedBy(auth()->user())->performedOn($package)->withProperties($package->getChanges())->log('Admin updated Ad Package');
        return redirect()->route('admin.ad-packages.index')->with('success','Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $request, AdPackage $package){
        $request->validate([
            'status'=>'required'
        ]);
        $package->active=$request->status;
        $package->save();
        activity()->causedBy(auth()->user())->performedOn($package)->withProperties($package->getChanges())->log('Admin updated Ad Package status');
        return $this->successResponse(null,'status updated successfully');
    }
}
