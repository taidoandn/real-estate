<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post as PostResource;
use App\Http\Requests\PostRequest;
use App\Models\Convenience;
use App\Models\PropertyDetail;

class PostController extends Controller
{
    protected $paginate = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Post::with('user','district.city','detail','property_type','images','distances')->paginate($this->paginate), 200);
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
        $post->load(['user','district.city','detail','property_type','images','distances']);
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
        $this->deleteImage($post->image);
        $property_images = $post->images;
        foreach ($property_images as $image) {
            $this->deleteImage($image->path);
        }
        $post->delete();
        return response()->json(['success'=>'deleted!']);
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

    public function conveniences(Post $post){
        $conveniences = $post->conveniences;
        return response()->json($conveniences, 200);
    }

    public function convenienceById(Post $post,Convenience $convenience){
        $convenience = $post->conveniences->find($convenience);
        if (is_null($convenience)) {
            return response()->json(null, 404);
        }
        return response()->json($convenience, 200);
    }

    public function detail(Post $post){
        $detail = $post->detail;
        return response()->json($detail, 200);
    }

    public function property_type(Post $post){
        $property_type = $post->property_type;
        return response()->json($property_type, 200);
    }

}
