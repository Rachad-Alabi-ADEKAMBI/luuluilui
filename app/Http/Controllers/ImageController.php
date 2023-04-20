<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function imageWaterMark()
    {
        $watermark = public_path('/img/ads/watermark.png');

        $image = Image::make(public_path('img/ads/pic.jpg'));

        $image->insert($watermark, 'bottom-right', 10, 10);

        $image->save(public_path('/img/ads/pic_with_watermark.jpg'));

        dd('success');
    }
}
