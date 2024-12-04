<?php

namespace App\Services;

use FFMpeg\FFMpeg;
use App\Models\Feed;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\FeedAttachment;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use App\Http\Resources\FeedResource;
use App\Models\User;
use App\Notifications\UserDatabaseNotification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Notification;

class FeedService{
    use ApiResponse;

    public function store(Request $request){
        $request->validate([
            'description'=>'nullable|string',
            'attachments'=>['nullable','array'],
            'privacy'=>['required','in:public,private,only-me'],
        ]);

        $description = $request->input('description');
        $attachments = $request->input('attachments', []);
        
        // Check if the post is empty
        if (empty($description) && empty($attachments)) {
            return $this->errorResponse('Post cannot be empty', 400);
        }

        $data=$request->only('description','privacy');
        $user=Auth::user();
        $feed=$user->feeds()->create($data);

       if ($attachments) {
            foreach($attachments as $attachment){
                $this->uploadAttachment($feed, $attachment);
            }
        }

        if($feed->privacy!='only-me'){
            $this->notifyFollowers($feed->id);
        }
        return $this->successResponse(new FeedResource($feed),'Feed Created Successfully');
    }

    public function update(Request $request,Feed $feed){
        $request->validate([
            'description'=>'nullable|string',
            'attachments'=>['nullable','array'],
            'delete_attachments'=>['nullable','array'],
            'privacy'=>['required','in:public,private,only-me'],
        ]);
        $user=Auth::user();
        if($user->id!=$feed->user_id){
            return abort(403);
        }
        $data=$request->only('description','privacy');
        $feed->update($data);
        
        if ($request->delete_attachments) {
            $feed->attachments()->whereIn('id', $request->delete_attachments)->delete();
        }        

        if ($request->attachments) {
            foreach($request->attachments as $attachment){
                $this->uploadAttachment($feed, $attachment);
            }
        }
        
        return $this->successResponse(new FeedResource($feed),'Feed Updated Successfully');
    }

    private function uploadAttachment(Feed $feed,$file){
        $mime = $file->getMimeType();
        $file_data=[];
        $data['feed_id']=$feed->id;
        $data['name']=$file->getClientOriginalName();
        $data['size']=number_format(($file->getSize()/1024),2);;
        if (strstr($mime, "video/")) {
            $data['type']='video';
            $file_data=$this->uploadVideo($file);
        } else if (strstr($mime, "image/")) {
            $data['type']='image';
            $file_data=$this->uploadImage($file);
        }else{
            $data['type']='document';
            $file_data=$this->uploadDocument($file);
        }

        FeedAttachment::create(array_merge($data,$file_data));
    }


    private function uploadVideo($video){
        $ffmpeg = FFMpeg::create();
        $video_frame = $ffmpeg->open($video->path());
        $frame = $video_frame->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(1));
        $thumbnail=time().'video-thumbnail.png';
        $thumbnail=public_path("/uploads/$thumbnail");
        $frame->save($thumbnail);

        $name=time().rand(111111,9999999).'.png';
        $thumbnail_path="chat-attachments/thumbnails/$name";


        Storage::disk('s3')->put($thumbnail_path, file_get_contents($thumbnail), 'public');
        $thumbnailUrl = Storage::disk('s3')->url($thumbnail_path);

        @unlink($thumbnail);

        $videoPath = $video->storePublicly('chat-attachments/videos', 's3');
        $videoUrl = Storage::disk('s3')->url($videoPath);
        return [
            'thumbnail'=>$thumbnailUrl,
            'file'=>$videoUrl
        ];
    }

    private function uploadImage($image){
        $imageManager = new ImageManager(new Driver());

        $img = $imageManager->read($image->path())->resize(220, 220, function ($constraint) {
            $constraint->aspectRatio();
        });
        $name=time().$image->getClientOriginalName();
        $thumbnail_path="feeds/thumbnails/$name";
        Storage::disk('s3')->put($thumbnail_path, $img->encode(), 'public');
        $thumbnailUrl = Storage::disk('s3')->url($thumbnail_path);

        $imagePath = $image->storePublicly('feeds/images', 's3');
        $imageUrl = Storage::disk('s3')->url($imagePath);

        return [
            'file'=>$imageUrl,
            'thumbnail'=>$thumbnailUrl
        ];
    }

    private function uploadDocument($document){
        $document_path = $document->storePublicly('feeds/documents', 's3');
        $document_url = Storage::disk('s3')->url($document_path);
        return [
            'thumbnail'=>'null',
            'file'=>$document_url
        ];
    }

    private function notifyFollowers($feed_id){
        $user=Auth::user();
        $data=[
            'id'=>$feed_id,
            'type'=>'feed',
            'title'=>'New Post',
            'description'=>$user->name.' just created a new post'
        ];
        $followers=$user->followers()->pluck('follower_id')->toArray();
        $users=User::whereIn('id',$followers)->select('id','email')->get();
        if($users->count()>=500){
            $users->chunk(500, function ($chunk) use ($data){
                Notification::send($chunk, new UserDatabaseNotification($data));
            });
        }else{
            Notification::send($users, new UserDatabaseNotification($data));
        }
    }
}
