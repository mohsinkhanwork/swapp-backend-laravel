<?php

namespace App\Services;

use App\Models\ChatAttachment;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ChatAttachmentService {

    private $attachment_name;
    private $message_id;
    private $size;
    private $type;

    public function __construct($message_id)
    {
        $this->message_id=$message_id;
    }

    public function upload($file,$type){
        $this->size=number_format(($file->getSize()/1024),2);
        $this->attachment_name=$file->getClientOriginalName();
        $this->type=$type;
        if($type=='image'){
            return $this->uploadImage($file);
        }elseif($type=='video'){
            return $this->uploadVideo($file);
        }else{
            return $this->uploadDocument($file);
        }
    }

    public function uploadDocument($document){
        $document_path = $document->storePublicly('chat-attachments/documents', 's3');
        $document_url = Storage::disk('s3')->url($document_path);
        return $this->addAttachment($document_url);
    }


    public function uploadVideo($video){
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
        return $this->addAttachment($videoUrl,$thumbnailUrl);
    }


    public function uploadImage($image){
        $imageManager = new ImageManager(new Driver());

        $img = $imageManager->read($image->path())->resize(220, 220, function ($constraint) {
            $constraint->aspectRatio();
        });
        $name=time().$image->getClientOriginalName();
        $thumbnail_path="chat-attachments/thumbnails/$name";
        Storage::disk('s3')->put($thumbnail_path, $img->encode(), 'public');
        $thumbnailUrl = Storage::disk('s3')->url($thumbnail_path);

        $imagePath = $image->storePublicly('chat-attachments/images', 's3');
        $imageUrl = Storage::disk('s3')->url($imagePath);
        return $this->addAttachment($imageUrl,$thumbnailUrl);
    }

    public function addAttachment($file,$thumbnail=null){
        ChatAttachment::create([
            'file'=>$file,
            'name'=>$this->attachment_name,
            'type'=>$this->type,
            'size'=>$this->size,
            'thumbnail'=>$thumbnail,
            'message_id'=>$this->message_id
        ]);
        return response()->json('success');
    }
}
