<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Storage;

trait  UploadFile
{
   
    public static function upload($request,$folderName,$type,$file_name=null)
    {
        if ($file = $request->file($type)) {
            $file_extension=$file->getClientOriginalExtension();
            $file_size=$file->getSize();
            if($file_name===null) {
                $path = $file->store($folderName, 'user');
            }
            else {
                $path = $file->storeAs($folderName, $file_name, 'user');
            }
        $url= Storage::disk('user')->url($path);
        return [$url,$file_extension,$file_size];
        }
    }

    

}
