<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Models\PostType;

class AjaxController extends Controller
{
    public function uploadImage(Request $request){
        $this->validate($request,[
            'file' => 'image|mimes:jpg,jpeg,bmp,png|max:2048'
        ]);
        $image_name = saveImage($request->file);
        $image = PropertyImage::create(['path'=>$image_name,'post_id'=>$request->id]);

        return view('backend.post._image',compact('image'));
    }

    public function deleteImage(Request $request){
        $image = PropertyImage::findOrFail($request->id);
        $path  = $image->path;
        unlinkImage($path);
        $image->delete();
        return "Xóa ảnh thành công";
    }

    // public function getDistricts(Request $request){
    //     if ($request->ajax()) {
    //         $districts =  DB::table('districts')
    //                         ->where('city_id',$request->city_id)
    //                         ->select('id','name','city_id')
    //                         ->get();
    //         return $districts;
    //     }
    // }

    public function getPostType(Request $request){
        $type =  PostType::findOrFail($request->type);
        return response()->json($type);
    }

    public function getNotification(){
        $notifications       = auth('admin')->user()->notifications;
        $unreadNotifications = auth('admin')->user()->unreadNotifications;
        return view('backend.partial._notification',compact('notifications', 'unreadNotifications'))->render();
    }
    public function getCities()
    {
        $url = 'https://thongtindoanhnghiep.co/api/city';
        $ch = curl_init();
        $options = [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL            => $url
        ];
        curl_setopt_array($ch, $options);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);
        return $data;
    }

    public function getDistricts(Request $request)
    {
        // $url = 'https://thongtindoanhnghiep.co/api/city/'.(int)$request->id."/district";
        // $ch = curl_init();
        // $options = [
        //     CURLOPT_SSL_VERIFYPEER => false,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_URL            => $url
        // ];

        // curl_setopt_array($ch, $options);
        // $data = json_decode(curl_exec($ch));
        // curl_close($ch);
        // return $data;
        if ($request->ajax()) {
            $districts =  DB::table('districts')
                ->where('city_id', $request->city_id)
                ->select('id', 'name', 'city_id')
                ->get();
            return $districts;
        }
    }
}
