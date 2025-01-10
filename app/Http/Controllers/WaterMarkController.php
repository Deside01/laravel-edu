<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WaterMarkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): StreamedResponse
    {
        $request->validate([
            'fileimage' => 'required|file|mimes:png,jpg|max:5120',
            'message' => 'required|string|min:10|max:20',
        ]);

        $file = $request->file('fileimage');
        $msg = $request->input('message');

        return response()->stream(function () use ($file, $msg) {
           $image = imagecreatefromjpeg($file);

           $textColor = imagecolorallocate($image, 255, 255, 255);

           $fontsize = 5;
           $margin = 10;

           $textWidth = imagefontwidth($fontsize) * strlen($msg);
           $textHeight = imagefontheight($fontsize);

           $x = imagesx($image) - $textWidth - $margin;
           $y = imagesy($image) - $textHeight - $margin;

           imagestring($image, $fontsize, $x, $y, $msg, $textColor);

           header('Content-type: image/jpeg');

           imagejpeg($image);

           imagedestroy($image);
        }, 200, ['Content-Type' => 'image/jpeg']);
    }
}
