<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-categories,admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=BlogCategory::with('parentCategory')->get();
        return view('admin.blog-categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=BlogCategory::all();
        return view('admin.blog-categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'parent_id'=>'nullable'
        ]);
        $data=$request->only('name','parent_id');
        $data['slug']=generateModelSlug(new BlogCategory,$data['name']);
        $category=BlogCategory::create($data);

        activity()->causedBy(auth()->user())->performedOn($category)->withProperties($category)->log('Admin added a new blog category');
        return redirect()->route('admin.blog-categories.index')->with('success','New Category Created Successfully');
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
        $categories=BlogCategory::all();
        $category=BlogCategory::find($id);
        return view('admin.blog-categories.edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'parent_id'=>'nullable'
        ]);
        $data=$request->only('name','parent_id');
        $data['slug']=generateModelSlug(new BlogCategory,$data['name'],$id);
        $category=BlogCategory::findOrFail($id);
        $category->update($data);

        activity()->causedBy(auth()->user())->performedOn($category)->withProperties($category->getChanges())->log('Admin updated a blog category');
        return redirect()->route('admin.blog-categories.index')->with('success','Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=BlogCategory::find($id);
        $category->delete();

        activity()->causedBy(auth()->user())->performedOn($category)->withProperties($category)->log('Admin delete a blog category');
        return redirect()->back()->with('success','Category Deleted Successfully!');
    }
}
