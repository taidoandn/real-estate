<?php

namespace App\Http\Controllers\Api;

use Gate;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Jobs\NewPostCreatedJob;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\ApiPostRequest;

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
        return response()->json(Post::with('user','district.city','detail','property_type','images','distances','type')
                        ->isPublished()
                        ->paginate($this->paginate), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiPostRequest $request)
    {
        $data = $request->all();
        $data['negotiable'] = $request->negotiable == 1 ? true : false;
        $data['user_id'] =  auth('api')->id();
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

        if ($request->conveniences) {
            $post->conveniences()->attach($request->conveniences);
        }
        if ($request->distances) {
            foreach ($request->distances as $key => $distance) {
                $post->distances()->attach($key, ['meters' => $distance]);
            }
        }


        if ($request->has('fImageDetails')) {
            foreach ($request->file('fImageDetails') as  $file) {
                $file_name = saveImage($file);
                $post->images()->create(['path'=>$file_name]);
            }
        }
       //Send Mail , dispatch send mail job
        dispatch(new NewPostCreatedJob(auth()->user(),$post));

        return response()->json($post->load('user','district.city','detail','property_type','images','distances'),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['user','district.city','detail','property_type','images','conveniences','distances','type']);
        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(ApiPostRequest $request, Post $post)
    {
        $data = $request->all();
        $data['negotiable'] = $request->negotiable == 1 ? true : false;

        if ($request->hasFile('fImage')) {
            unlinkImage($post->image);
            $image_name = saveImage($request->file('fImage'));
            $data['image'] = $image_name;
        }

        $post->update($data);

        $post->detail()->update([
            'floor'        => (int)$request->floor,
            'bath'         => (int)$request->bath,
            'balcony'      => (int)$request->balcony,
            'toilet'       => (int)$request->toilet,
            'bed_room'     => (int)$request->bed_room,
            'dinning_room' => $request->dinning_room ? true : false,
            'living_room'  => $request->living_room ? true : false,
        ]);

        if ($request->conveniences) {
            $post->conveniences()->sync($request->conveniences);
        }

        if ($request->distances) {
            $array_distances = [];
            foreach($request->distances as $key => $distance){
                $array_distances[$key] = ['meters' => $distance];
            }
            $post->distances()->sync($array_distances,false);
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
        if (Gate::denies('delete', $post)) {
            return response()->json(['error' => 'unauthorized'], 404);
        }
        $post->delete();
        return response()->json(['success'=>'deleted!']);
    }

    public function postByAuth()
    {
        $posts = auth('api')->user()->posts()->with('district.city')->orderBy('created_at')->paginate($this->paginate);
        return response()->json($posts, 200);
    }

}
