<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AjaxController extends Controller
{
    public function uploadImage(Request $request){
        $this->validate($request,[
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
        $image->delete();
        return "Xóa ảnh thành công";
    }

    public function saveImage($image){
        $image_name = rand(1111,9999).time().".".$image->getClientOriginalExtension();
        $image->move(public_path('uploads/images/'),$image_name);
        return $image_name;
    }

    public function getDistricts(Request $request){
        if ($request->ajax()) {
            $districts =  DB::table('districts')
                            ->where('city_id',$request->city_id)
                            ->select('id','name','city_id')
                            ->get();
            return $districts;
        }
    }
}
