<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:skill-categories,admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=SkillCategory::all();
        return view('admin.skill-categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_tr'=>'required',
            'title_en'=>'required'
        ]);
        $data=$request->only('title_tr','title_en');
        $category=SkillCategory::create($data);

        activity()->causedBy(auth()->user())->performedOn($category)->withProperties($category)->log('Admin added a new skill category');
        return redirect()->route('admin.skill-categories.index')->with('success','New Skill Category Created Successfully');
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
        $category=SkillCategory::findOrFail($id);
        return view('admin.skill-categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_en'=>'required',
            'title_tr'=>'required'
        ]);
        $data=$request->only('title_tr','title_en');
        $category=SkillCategory::findOrFail($id);
        $category->update($data);

        activity()->causedBy(auth()->user())->performedOn($category)->withProperties($category->getChanges())->log('Admin updated a skill category');
        return redirect()->route('admin.skill-categories.index')->with('success','Skill Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=SkillCategory::find($id);
        $category->delete();

        activity()->causedBy(auth()->user())->performedOn($category)->withProperties($category)->log('Admin deleted a skill category');
        return redirect()->back()->with('success','Skill Category Deleted Successfully!');
    }
}
