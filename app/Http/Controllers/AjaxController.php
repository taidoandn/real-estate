<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Intervention\Image\Facades\Image;

class AjaxController extends Controller
{
    public function uploadImage(Request $request){
        $this->validate($request,
        [
            'file' => 'image|mimes:jpg,jpeg,bmp,png|max:2048'
        ]);
        $image_name = $this->saveImage($request->file);
        $image = PropertyImage::create(['path'=>$image_name,'post_id'=>$request->id]);

        return view('backend.post._image',compact('image'));
    }

    public function deleteImage(Request $request){
        $image = PropertyImage::findOrFail($request->id);
        $path  = $image->path;

        if (file_exists(public_path("uploads/images/$path"))) {
            unlink(public_path("uploads/images/$path"));
        };

        $deleteResize = function ($suffix = 'thumb') use($path){
            if (file_exists(public_path("uploads/images/".get_thumbnail($path,$suffix)))) {
                unlink(public_path("uploads/images/".get_thumbnail($path,$suffix)));
            };
        };
        $deleteResize();
        $image->delete();
        return "Xóa ảnh thành công";
    }

    public function saveImage($image){
        $image_name = rand(1111,9999).time().".".$image->getClientOriginalExtension();
        $image->move(public_path('uploads/images/'),$image_name);

        $resizeImage = function ($suffix = 'thumb',$width = 300 , $height = 170) use($image_name,$image){
            $extension = $image->getClientOriginalExtension();
            $thumb     = str_replace(".$extension","_{$suffix}.{$extension}",$image_name);
            Image::make(public_path("uploads/images/$image_name"))
                ->resize($width,$height)
                ->save(public_path("uploads/images/$thumb"))
                ->destroy();
        };
        $resizeImage();
        return $image_name;
    }
}
