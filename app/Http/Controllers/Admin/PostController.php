<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;


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
        $users = User::get();
        return view('backend.post.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request){
        $data = $request->all();
        $data['negotiable'] = $request->negotiable ? true : false;
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
        return redirect()->route('admin.posts.index')->with('success','Thêm bài viết thành công');
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
        $users = User::get();
        $post  = Post::with('detail','district.city','property_type','conveniences')->findOrFail($id);
        return view('backend.post.edit',compact('post','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id){
        $post = Post::findOrFail($id);
        $data = $request->all();
        $data['negotiable'] = $request->negotiable ? true : false;
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

        return redirect()->route('admin.posts.index')->with('success','Cập nhật bài viết thành công');
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
                    ->editColumn('price',function($post){
                        return $post->priceFormat;
                    })
                    ->editColumn('status',function ($post){
                        return view('backend.post._status',compact('post'));
                    })
                    ->rawColumns(['action', 'image','status','price'])
                    ->make(true);
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
        return $image_name;
    }

    /**
     * Function delete image
     *
     * @param [string] image_name
     * @return void
     */
    public function deleteImage($image_name){
        if ($image_name != 'call-to-action.jpg' && $image_name != 'themeqx-cover.jpeg') {
            if (file_exists(public_path("uploads/images/$image_name"))) {
                unlink(public_path("uploads/images/$image_name"));
            };
        }
    }
}
