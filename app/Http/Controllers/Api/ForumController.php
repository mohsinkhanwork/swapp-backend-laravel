<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ForumAnswerListResource;
use App\Http\Resources\ForumAnswerResource;
use App\Http\Resources\ForumCommentResource;
use App\Http\Resources\ForumQuestionListResource;
use App\Http\Resources\ForumQuestionResource;
use App\Models\ForumAnswer;
use App\Models\ForumComment;
use App\Models\ForumQuestion;
use App\Models\Tag;
use App\Notifications\ForumBestAnswerNotification;
use App\Notifications\ForumNewReplyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends ApiController
{
    public function questions(){
        $search=request('search','');
        $tags=request('tags',[]);
        $questions=ForumQuestion::with('tags','user')->withCount('answers')
                    ->when($search!='',function($qry) use($search){
                        $qry->where(function($qry) use($search){
                            $qry->where('title','like',"%$search%")->orWhere('detail','like',"%$search%");
                        });
                    })
                    ->when(count($tags)>0,function($qry) use($tags){
                        $qry->whereHas('tags',function($qry) use($tags){
                            $qry->whereIn('tags.id',$tags);
                        });
                    })
                    ->latest()->paginate(15);
        return $this->successResponse(new ForumQuestionListResource($questions));
    }

    public function myQuestions(){
        $user=Auth::user();
        $questions=ForumQuestion::where('user_id',$user->id)->with('tags','user')->withCount('answers')->latest()->paginate(15);
        return $this->successResponse(new ForumQuestionListResource($questions));
    }

    public function getSingleQuestion(ForumQuestion $question){
        if($question->user_id!=Auth::id()){
            $question->increment('views_count');
        }
        return $this->successResponse(new ForumQuestionResource($question));
    }

    public function postQuestion(Request $request){
        $data=$request->validate([
            'title'=>'required',
            'detail'=>'required',
            'privacy'=>['required','in:public,members-only'],
            'tags'=>['array','required']
        ]);
        $data['user_id']=Auth::id();
        $question=ForumQuestion::create($data);
        foreach ($data['tags'] as $tagName) {
            $tag=Tag::firstOrCreate(['name'=>$tagName]);
            $question->tags()->attach($tag);
        }
        return $this->successResponse(new ForumQuestionResource($question));
    }

    public function updateQuestion(Request $request,ForumQuestion $question){
        $data=$request->validate([
            'title'=>'required',
            'detail'=>'required',
            'privacy'=>['required','in:public,members-only'],
            'tags'=>['array','required']
        ]);
        $data=$request->only('title','detail','privacy');
        $question->update($data);

        $question->tags()->detach();

        foreach ($request->tags as $tagName) {
            $tag=Tag::firstOrCreate(['name'=>$tagName]);
            $question->tags()->attach($tag);
        }
        return $this->successResponse(new ForumQuestionResource($question));
    }

    public function answers(ForumQuestion $question){
        if($question->user_id!=Auth::id()){
            $question->increment('views_count');
        }
        $answers=ForumAnswer::withCount('comments')
                ->with(['comments'=>function($qry){
                    $qry->latest()->take(2)->get();
                },'comments.user','user'])
                ->where('question_id',$question->id)
                ->orderBy('best_answer')->orderBy('likes_count','desc')->paginate(15);
        return $this->successResponse([
            'question'=>new ForumQuestionResource($question),
            'answers'=>new ForumAnswerListResource($answers)
        ]);
    }

    public function postAnswer(Request $request, ForumQuestion $question){
        $data=$request->validate([
            'detail'=>'required'
        ]);
        $data['user_id']=Auth::id();
        $answer=$question->answers()->create($data);
        $user=Auth::user();
        $data=[
            'id'=>$question->uuid,
            'type'=>'forum',
            'title'=>"New Answer",
            'description'=>$user->name.' answered on your question posted. check now.'
        ];
        $question->user->notify(new ForumNewReplyNotification($data,$request->detail,$user->name));
        return $this->successResponse(new ForumAnswerResource($answer));
    }

    public function getComments(ForumAnswer $answer){
        $comments=ForumComment::with('user')->where('answer_id',$answer->id)->latest()->get();
        return $this->successResponse(ForumCommentResource::collection($comments));
    }
    public function postComment(Request $request, ForumAnswer $answer){
        $data=$request->validate([
            'detail'=>'required'
        ]);
        $data['user_id']=Auth::id();
        $answer=$answer->comments()->create($data);
        return $this->successResponse(new ForumCommentResource($answer));
    }

    public function likeAnswer(Request $request, ForumAnswer $answer){
        $user=Auth::user();
        $like=$answer->likes()->where('answer_likes.user_id',$user->id)->first();
        if(!$like){
            $answer->increment('likes_count');
            $answer->likes()->create(['user_id'=>$user->id]);
        }else{
            $answer->decrement('likes_count');
            $like->delete();
        }
        return $this->successResponse(new ForumAnswerResource($answer),'like status updated');
    }

    public function markAnswerBest(ForumAnswer $answer){
        $user=Auth::user();
        $question=ForumQuestion::findOrFail($answer->question_id);
        if($question->user_id!=$user->id || !$question->active){
            return abort(403);
        }
        $answer->best_answer=true;
        $answer->save();
        $question->active=false;
        $question->save();
        $data=[
            'id'=>$question->uuid,
            'type'=>'forum',
            'title'=>'Best Answer',
            'description'=>$user->name.' marked your answer as best. check now.'
        ];
        $answer->user->notify(new ForumBestAnswerNotification($data,$user->name,$question->title));
        return $this->successResponse(new ForumAnswerResource($answer),'Answer Marked as best');
    }

    public function destroyQuestion(ForumQuestion $question){
        $user=Auth::user();
        if($question->user_id!=$user->id){
            return abort(403);
        }
        $question->delete();
        return $this->successResponse(null,'Question Deleted Successfully');
    }

    public function destroyAnswer(ForumAnswer $answer){
        $user=Auth::user();
        if($answer->user_id!=$user->id){
            return abort(403);
        }
        $answer->delete();
        return $this->successResponse(null,'Reply Deleted Successfully');
    }

    public function destroyComment(ForumComment $comment){
        $user=Auth::user();
        if($comment->user_id!=$user->id){
            return abort(403);
        }
        $comment->delete();
        return $this->successResponse(null,'Comment Deleted Successfully');
    }
}
