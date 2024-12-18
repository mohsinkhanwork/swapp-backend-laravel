<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SubAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin-management,admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins=Admin::where('is_superadmin',false)->get();
        return view('admin.sub-admins.index',compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::where('name','!=','superadmin')->get();
        return view('admin.sub-admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:8',
            'roles' => 'required',
        ]);

        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $admin->syncRoles($request->input('roles'));

        $admin->load('roles');
        activity()->causedBy(auth()->user())->performedOn($admin)->withProperties($admin)->log('Admin added a new Sub Admin.');
        return redirect()->route('admin.sub-admins.index')->with('success','Sub Admin created successfully');
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
        $admin=Admin::with('roles')->findOrFail($id);
        $roles=Role::where('name','!=','superadmin')->get();
        return view('admin.sub-admins.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:8',
            'roles' => 'required',
        ]);
        $data=$request->only('name','email');
        if($request->password!=''){
            $data['password']=bcrypt($request->password);
        }
        $admin=Admin::findOrFail($id);
        $admin->update($data);
        $admin->syncRoles($request->input('roles'));

        $admin->load('roles');
        activity()->causedBy(auth()->user())->performedOn($admin)->withProperties($admin)->log('Admin updated Sub Admin.');
        return redirect()->route('admin.sub-admins.index')->with('success','Sub Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin=Admin::find($id);
        $admin->load('roles');
        $admin->delete();

        activity()->causedBy(auth()->user())->performedOn($admin)->withProperties($admin)->log('Admin deleted sub admin account');
        return redirect()->back()->with('success','Sub Admin Deleted Successfully!');
    }
}
