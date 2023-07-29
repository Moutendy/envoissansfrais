<?php

namespace App\Services;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

/**
 * Class ImageService
 * @package App\Services
 */
class ImageService
{
    public function saveImage($image,$path='public')
    {
       $filename=time().'.jpg';
       Storage::disk($path)->put($filename,base64_decode($image));
       return URL::to('/').'/storage/'.$path.'/'.$filename;
    }
}
