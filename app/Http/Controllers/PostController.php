<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\User;
use App\Mail\NewPostCreated;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Jobs\NewPostCreatedJob;

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
            $image_name = saveImage($request->file('fImage'));
            $data['image'] = $image_name;
        }

        $post   = Auth::user()->posts()->create($data);
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

        if ($request->distances) {
            foreach ($request->distances as $key => $distance) {
                $post->distances()->attach($key,['meters'=> $distance]);
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

        return redirect()->route('posts.index')->with('success','Tạo bài viết thành công. Vui lòng check email để tiếp tục thực hiện!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('user','detail','district.city','images')->where('slug',$slug)->isPublished()->firstOrFail();

        $post_key = 'post_'.$post->id;
        if (!Session::has($post_key)) {
            $post->increment('views');
            Session::put($post_key, 1);
        }
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
        $post     = Post::findOrFail($id);
        $this->authorize('update', $post);
        $post->load('district.city','detail','property_type','images');
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
        $data = $request->except(['start_date','end_date','type_id']);

        $data['negotiable'] = $request->negotiable ? true : false;

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

        $post->conveniences()->sync($request->conveniences);

        $array_distances = [];

        foreach($request->distances as $key => $distance){
            $array_distances[$key] = ['meters' => $distance];
        }

        $post->distances()->sync($array_distances,false);

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
		$post->delete();
		return redirect()->back()->with('success','Xóa thành công');
    }

    public function getFavoritePosts(){
        $posts = User::find(Auth::user()->id)->favorites()->isPublished()->paginate($this->paginate);
        return view('frontend.post.favorite',compact('posts'));
    }

}
