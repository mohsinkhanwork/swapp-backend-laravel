<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:skills,admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills=Skill::with('category')->get();
        return view('admin.skills.index',compact('skills'));
    }

    public function getSkillNames()
    {
        $skills = Skill::select('id', 'category_id', 'title_en')->get();
        return response()->json(['skills' => $skills], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=SkillCategory::all();
        return view('admin.skills.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en'=>'required',
            'title_tr'=>'required',
            'category_id'=>'required'
        ]);
        $data=$request->only('title_tr','title_en','category_id');
        $skill=Skill::create($data);
        activity()->causedBy(auth()->user())->performedOn($skill)->withProperties($skill)->log('Admin added a new skill');
        return redirect()->route('admin.skills.index')->with('success','New Skill Created Successfully');
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
        $skill=Skill::findOrFail($id);
        $categories=SkillCategory::all();
        return view('admin.skills.edit',compact('categories','skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_en'=>'required',
            'title_tr'=>'required',
            'category_id'=>'required'
        ]);
        $data=$request->only('title_tr','title_en','category_id');
        $skill=Skill::findOrFail($id);
        $skill->update($data);

        activity()->causedBy(auth()->user())->performedOn($skill)->withProperties($skill->getChanges())->log('Admin updated a skill');
        return redirect()->route('admin.skills.index')->with('success','Skill Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill=Skill::findOrFail($id);
        $skill->delete();

        activity()->causedBy(auth()->user())->performedOn($skill)->withProperties($skill)->log('Admin deleted a skill');
        return redirect()->route('admin.skills.index')->with('success','Skill Deleted Successfully!');
    }
}
