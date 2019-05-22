<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use App\Models\PostType;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReportRequest;

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

    public function getDistricts(Request $request){
        if ($request->ajax()) {
            $districts =  DB::table('districts')
                            ->where('city_id',$request->city_id)
                            ->select('id','name','city_id')
                            ->get();
            return $districts;
        }
    }

    public function getPostType(Request $request){
        $type =  PostType::findOrFail($request->type);
        return response()->json($type);
    }

    public function getNotification(){
        $notifications       = auth('admin')->user()->notifications;
        $unreadNotifications = auth('admin')->user()->unreadNotifications;
        return view('backend.partial._notification',compact('notifications', 'unreadNotifications'))->render();
    }

    public function reportPost(ReportRequest $request){
        if ($request->ajax()) {
            Report::create($request->all());
        }
    }

    public function publishPost(Request $request,$id){
        $post = Post::findOrFail($id);
        $post->update(['status' => 'published']);
        return back()->with('success','Cập nhật thành công!');
    }
}
