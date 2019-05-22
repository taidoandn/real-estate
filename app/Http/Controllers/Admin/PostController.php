<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\NewPostCreatedJob;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $this->authorize("read-post");
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $this->authorize("create-post");
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
        $this->authorize("create-post");
        $data = $request->all();
        $data['negotiable'] = $request->negotiable == 1 ? true : false;
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

        $user = User::findOrFail($request->user_id);

        //Send Mail , dispatch send mail job
        dispatch(new NewPostCreatedJob($user,$post));

        return redirect()->route('admin.posts.index')->with('success','Thêm bài viết thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize("update-post");
        $users = User::get();
        $post  = Post::with('detail','district.city','property_type','conveniences','type','distances','images')->findOrFail($id);
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
        $this->authorize("update-post");
        $post = Post::findOrFail($id);
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

        $post->conveniences()->sync($request->conveniences);

        $array_distances = [];
        foreach($request->distances as $key => $distance){
            $array_distances[$key] = ['meters' => $distance];
        }
        $post->distances()->sync($array_distances,false);

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
        $this->authorize('delete-post');
        $post = Post::findOrFail($id);
        $post->delete();
        return "Xóa thành công";
    }

    public function getPosts(Request $request){
        if ($request->ajax()) {
            $posts = Post::query()->orderBy('id','desc');
            $datatables =  Datatables::of($posts);

            if ($request->get('status')) {
                $posts->where('status',$request->get('status'));
            }
            if ($request->get('keyword')) {
                $posts->where('title','LIKE',"%".$request->get('keyword')."%");
            }
            if ($request->get('start_date')) {
                $posts->whereDate('start_date','>=',$request->get('start_date'));
            }
            if ($request->get('end_date')) {
                $posts->whereDate('end_date','<=',$request->get('end_date'));
            }

            return  $datatables
                    ->addColumn('action',function ($post){
                        return view('backend.post._action',compact('post'));
                    })
                    ->editColumn('title', '{!! str_limit($title, 50) !!}')
                    ->addColumn('owner',function ($post){
                        return $post->user->email;
                    })
                    ->editColumn('image',function ($post){
                        $url= $post->image_url;
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

}
