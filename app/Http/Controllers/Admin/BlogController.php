<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:blogs,admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::all();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=BlogCategory::all();
        $tags=Tag::all();
        return view('admin.blogs.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'tags' => 'nullable|array',
            'summary' => 'required|string',
            'content' => 'required|string',
            'meta_description'=>'required|string',
            'published' => 'required|boolean',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('thumbnail')) {
            $uploadedFile = $validatedData['thumbnail'];
            $imagePath = $uploadedFile->storePublicly('blogs', 's3');
            $imageUrl = Storage::disk('s3')->url($imagePath);
            $validatedData['thumbnail'] =$imageUrl;
        }

        $validatedData['blog_category_id']=$validatedData['category_id'];
        $validatedData['admin_id']=Auth::guard('admin')->id();
        $validatedData['slug']=generateModelSlug(new Blog,$validatedData['title']);
        $validatedData['published_at']=now();
        $blog=Blog::create($validatedData);


        if (isset($validatedData['tags']) && is_array($validatedData['tags'])) {
            foreach ($validatedData['tags'] as $tagName) {
                $tag=Tag::firstOrCreate(['name'=>$tagName]);
                $blog->tags()->attach($tag);
            }
        }

        activity()->causedBy(auth()->user())->performedOn($blog)->withProperties($blog)->log('Admin added a new blog');
        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');
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
        $blog=Blog::find($id);
        $categories=BlogCategory::all();
        $tags=Tag::all();
        return view('admin.blogs.edit',compact('categories','tags','blog'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'tags' => 'nullable|array',
            'summary' => 'required|string',
            'content' => 'required|string',
            'meta_description'=>'required|string',
            'published' => 'required|boolean',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('thumbnail')) {
            $uploadedFile = $validatedData['thumbnail'];
            $imagePath = $uploadedFile->storePublicly('blogs', 's3');
            $imageUrl = Storage::disk('s3')->url($imagePath);
            $validatedData['thumbnail'] =$imageUrl;
        }

        $validatedData['blog_category_id']=$validatedData['category_id'];
        $validatedData['slug']=generateModelSlug(new Blog,$validatedData['title']);

        $filteredData = collect($validatedData)->except(['category_id','tags'])->toArray();
        $blog=Blog::findOrFail($id);
        $blog->update($filteredData);

        $blog->tags()->detach();

        if (isset($validatedData['tags']) && is_array($validatedData['tags'])) {
            foreach ($validatedData['tags'] as $tagName) {
                $tag=Tag::firstOrCreate(['name'=>$tagName]);
                $blog->tags()->attach($tag);
            }
        }

        activity()->causedBy(auth()->user())->performedOn($blog)->withProperties($blog->getChanges())->log('Admin updated a blog');
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=Blog::find($id);
        $blog->delete();

        activity()->causedBy(auth()->user())->performedOn($blog)->withProperties($blog)->log('Admin deleted a blog');
        return redirect()->back()->with('success','Blog Deleted Successfully!');
    }
}
