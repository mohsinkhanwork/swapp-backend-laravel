<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\FeedCommentListResource;
use App\Http\Resources\FeedCommentResource;
use App\Http\Resources\FeedListResource;
use App\Http\Resources\FeedResource;
use App\Models\Feed;
use App\Models\FeedComment;
use App\Notifications\UserDatabaseNotification;
use App\Services\FeedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends ApiController
{
    public function __construct(private FeedService $service)
    {

    }

    public function store(Request $request){
        return $this->service->store($request);
    }

    public function update(Request $request,Feed $feed){
        return $this->service->update($request,$feed);
    }

    public function list(){
        $search=request('search','');
        $user=Auth::user();
        $following=$user->following()->pluck('following_id')->toArray();
        $following[]=$user->id;
        $q = Feed::query()->with('attachments')
            ->where('privacy', 'public');
            $q->orWhere(function ($q) use($following){
                $q->whereIn('user_id',$following)->where('privacy','private');
            })
            ->orWhere(function ($q){
                $q->where('user_id',Auth::id())->where('privacy','only-me');
            });
        $feeds = $q->orderBy('id','desc')->with(['user'])->paginate(10);
        return $this->successResponse(new FeedListResource($feeds));
    }


    public function destroy(Feed $feed){
        $user=Auth::user();
        if($user->id!=$feed->user_id){
            return $this->errorResponse('You are not allowed to delete this feed', 403);
        }
        $feed->delete();
        return $this->successResponse(null,'Feed Deleted Successfully');
    }

    public function getComments(Feed $feed){
        $comments=$feed->comments()->with('user')->paginate(20);
        return $this->successResponse(new FeedCommentListResource($comments));
    }

    public function postComment(Request $request,Feed $feed){
        $data=$request->validate([
            'detail'=>'required'
        ]);
        $data['user_id']=Auth::id();
        $comment=$feed->comments()->create($data);
        $feed->increment('comments_count');

        $user=Auth::user();
        $feed->user->notify(new UserDatabaseNotification(['id'=>$feed->id,'type'=>'feed','title'=>"New Comment",'description'=>$user->name." commented on your post"]));
        return $this->successResponse(new FeedCommentResource($comment),'Comment posted successfully');
    }

    public function destroyComment(FeedComment $comment){
        $user=Auth::user();
        if($user->id!=$comment->user_id){
            return abort(403);
        }
        $comment->delete();
        $comment->feed()->decrement('comments_count');
        return $this->successResponse(null,'Comment Deleted Successfully');
    }

    public function likeFeed(Feed $feed){
        $user=Auth::user();
        $like=$feed->likes()->where('feed_likes.user_id',$user->id)->first();
        if(!$like){
            $feed->increment('likes_count');
            $feed->likes()->create(['user_id'=>$user->id]);

            $feed->user->notify(new UserDatabaseNotification(['id'=>$feed->id,'type'=>'feed','title'=>"New Like",'description'=>$user->name." liked your post"]));
        }else{
            $feed->decrement('likes_count');
            $like->delete();
        }
        return $this->successResponse(new FeedResource($feed),'like status updated');
    }
}
