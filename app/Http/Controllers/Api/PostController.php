<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Mail\NewPostCreated;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    protected $paginate = 6;

    public function __construct(){
        $this->middleware('jwt.verify', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Post::with('user','district.city','detail','property_type','images','distances')
                        ->isPublished()
                        ->paginate($this->paginate), 200);
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
            $image_name = saveImage($request->file('fImage'));
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
                $file_name = saveImage($file);
                $post->images()->create(['path'=>$file_name]);
            }
        }
        Mail::to(auth('api')->user())->send(new NewPostCreated($post));
        return response()->json($post,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['user','district.city','detail','property_type','images','conveniences','distances']);
        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $data['negotiable'] = $request->negotiable ? true : false;
        if ($request->hasFile('fImage')) {
            unlinkImage($post->image);
            $image_name = saveImage($request->file('fImage'));
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

        if ($request->conveniences) {
            $post->conveniences()->sync($request->conveniences);
        }

        if ($request->distances) {
            foreach ($request->distances as $key => $distance) {
                $post->distances()->updateExistingPivot($key,['meters'=> $distance]);
            }
        }

        return response()->json($post->load('user','district.city','detail','property_type','images','distances'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        unlinkImage($post->image);
        $property_images = $post->images;
        foreach ($property_images as $image) {
            unlinkImage($image->path);
        }
        $post->delete();
        return response()->json(['success'=>'deleted!']);
    }

}
