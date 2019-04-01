<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    protected $paginate = 5;
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->with('district.city')->orderBy('created_at')->paginate($this->paginate);
        return view('frontend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('fImage')) {
            $image_name = $this->saveImage($request->file('fImage'));
            $data['image'] = $image_name;
        }
        $post   = Auth::user()->posts->create($data);

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
        return redirect()->route('posts.index')->with('success','Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $post->load('district.city','detail','property_type');
        return view('frontend.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->all();
        if ($request->hasFile('fImage')) {
            if ($post->image != 'call-to-action.jpg' && $post->image != 'themeqx-cover.jpeg') {
                $this->deleteImage($post->image);
            }
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

        return redirect()->route('posts.index')->with('success','Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
    }

}
