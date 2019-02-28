<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Post;
use App\Models\User;
use App\Models\Distance;
use App\Models\Convenience;
use App\Models\PropertyType;
use App\Models\PropertyImage;
use App\Models\PropertyDetail;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('backend.post.show');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $property_types = PropertyType::get();
        $distances = Distance::get();
        $conveniences = Convenience::get();
        $cities = City::get();
        $users = User::get();
        return view('backend.post.create',compact('property_types','distances','conveniences','cities','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request){
        $data = $request->all();
        $data['user_id'] = 1;

        if ($request->hasFile('fImage')) {
            $image_name = $this->saveImage($request->file('fImage'));
            $data['image'] = $image_name;
        }
        $post   = Post::create($data);

        $post->detail()->create([
            'floor'        => $request->floor,
            'bath'         => $request->bath,
            'balcony'      => $request->balcony,
            'toilet'       => $request->toilet,
            'bed_room'     => $request->bed_room,
            'dinning_room' => $request->dinning_room ? true : false,
            'living_room'  => $request->living_room ? true : false,
        ]);

        $post->conveniences()->attach($request->conveniences);

        foreach ($request->distances as $key => $distance) {
            $post->distances()->attach($key,['meters'=> $distance]);
        }

        if ($request->has('fImageDetails')) {
            foreach ($request->file('fImageDetails') as  $file) {
                $file_name = $this->saveImage($file);
                $post->images()->create(['path'=>$file_name]);
            }
        }
        return redirect()->route('admin.post.index')->with(['level'=>'success','message'=>'Thêm bài viết thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property_types = PropertyType::get();
        $distances = Distance::get();
        $conveniences = Convenience::get();
        $cities = City::get();
        $users = User::get();
        $post = Post::findOrFail($id);
        return view('backend.post.edit',compact('post','property_types','distances','conveniences','cities','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id){
        $post = Post::findOrFail($id);

        $data = $request->all();
        if ($request->hasFile('fImage')) {
            $this->deleteImage($post->image);
            $image_name = $this->saveImage($request->file('fImage'));
            $data['image'] = $image_name;
        }

        $post->update($data);

        $post->detail()->update([
            'floor'        => $request->floor,
            'bath'         => $request->bath,
            'balcony'      => $request->balcony,
            'toilet'       => $request->toilet,
            'bed_room'     => $request->bed_room,
            'dinning_room' => $request->dinning_room ? true : false,
            'living_room'  => $request->living_room ? true : false,
        ]);

        $post->conveniences()->sync($request->conveniences);

        foreach ($request->distances as $key => $distance) {
            $post->distances()->updateExistingPivot($key,['meters'=> $distance]);
        }

        return redirect()->route('admin.post.index')->with(['level'=>'success','message'=>'Cập nhật bài viết thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPosts(Request $request){
        if ($request->ajax()) {
            $posts = Post::query();
            return DataTables::of($posts)
                    ->addColumn('action',function ($post){
                        return view('backend.post._action',compact('post'));
                    })
                    ->editColumn('title', '{!! str_limit($title, 30) !!}')
                    ->addColumn('owner',function ($post){
                        return $post->user->name;
                    })
                    ->editColumn('image',function ($post){
                        $url= asset('uploads/images/'.$post->image);
                        return '<img src="'.$url.'" alt="'.$post->title.'" width="200px" >';
                    })
                    ->editColumn('price','{{ number_format($price,0,",","."). " đồng" }}')
                    ->editColumn('status',function ($post){
                        return view('backend.post._status',compact('post'));
                    })
                    ->rawColumns(['action', 'image','status'])
                    ->make(true);
        }
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

    /**
     * Function upload image
     *
     * @param [string] $image
     * @return string
     */
    public function saveImage($image){
        $image_name = rand(1111,9999).time().".".$image->getClientOriginalExtension();
        $image->move(public_path('uploads/images/'),$image_name);

        $resizeImage = function ($suffix = 'thumb',$width = 300 , $height = 170 ) use($image_name,$image){
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

    /**
     * Function delete image
     *
     * @param [string] image_name
     * @return void
     */
    public function deleteImage($image){
        if (file_exists(public_path("uploads/images/$image"))) {
            unlink(public_path("uploads/images/$image"));
        };

        $deleteResize = function ($suffix = 'thumb') use($image){
            if (file_exists(public_path("uploads/images/".get_thumbnail($image,$suffix)))) {
                unlink(public_path("uploads/images/".get_thumbnail($image,$suffix)));
            };
        };
        $deleteResize();
    }
}
