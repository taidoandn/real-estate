<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $paginate = 5;
    public function __construct(){
        $this->middleware('auth')->except('index','show');
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
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['negotiable'] = $request->negotiable ? true : false;

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
        $post->load('user');
        return view('frontend.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
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
    public function update(PostRequest $request,$id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        $data = $request->all();
        $data['negotiable'] = $request->negotiable ? true : false;
        $data['user_id'] = auth()->id();
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

        return redirect()->route('posts.index')->with('success','Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
    }

    public function saveImage($image){
        $image_name = rand(1111,9999).time().".".$image->getClientOriginalExtension();
        $image->move(public_path('uploads/images/'),$image_name);
        return $image_name;
    }

    public function deleteImage($image_name){
        if ($image_name != 'call-to-action.jpg' && $image_name != 'themeqx-cover.jpeg') {
            if (file_exists(public_path("uploads/images/$image_name"))) {
                unlink(public_path("uploads/images/$image_name"));
            };
        }
    }

    public function getFavoritePosts(){
        $posts = User::find(Auth::user()->id)->favorites()->isPublished()->paginate($this->paginate);
        return view('frontend.post.favorite',compact('posts'));
    }

}
