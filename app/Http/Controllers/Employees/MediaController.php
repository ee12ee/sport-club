<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\VideoRequest;
use App\Models\Image;
use App\Traits\ApiResponse;
use App\Traits\UploadFile;


class MediaController extends Controller
{
    use UploadFile, ApiResponse;
    public function storeImage(ImageRequest $request){
        $image=self::upload($request,'sport_images','image');
        Image::create(['url'=>$image[0],'extension'=>$image[1], 
                       'size'=>$image[2], 'sport_id'=>$request->sport_id]);
        return self::sendResponse(201,'the image is added successfully');                 
    }
    public function storeVideo(VideoRequest $request){
        $video=self::upload($request,'sport_videos','video');
        Image::create(['url'=>$video[0],'extension'=>$video[1], 
                       'size'=>$video[2], 'sport_id'=>$request->sport_id]);
        return self::sendResponse(201,'the video is added successfully');                 
    }
}
