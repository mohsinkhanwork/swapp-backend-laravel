<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForumQuestion;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:forum,admin');
    }

    public function index(){
        $questions=ForumQuestion::with('user','tags')->withCount('answers')->get();
        return view('admin.forum.index',compact('questions'));
    }

    public function show(ForumQuestion $question){
        return view('admin.forum.single',compact('question'));
    }

    public function destroy(ForumQuestion $question){
        $question->delete();

        activity()->causedBy(auth()->user())->performedOn($question)->withProperties($question)->log('Admin deleted a forum question');
        return redirect()->back()->with('success','Question Deleted from Forum Successfully');
    }
}
