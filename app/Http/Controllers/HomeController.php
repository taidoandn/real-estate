<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class HomeController extends Controller
{
    private $limit = 6;
    private $paginate = 6;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_posts = Post::with('detail','district.city','type')
                        ->isPublished()->latest()->take($this->limit)->get();
        $premium_posts = Post::with('detail','district.city','type')->isPublished()
                        ->where('type_id',2)->latest()->take($this->limit)->get();
        $vip_posts = Post::with('detail','district.city','type')->isPublished()
                        ->where('type_id',3)->latest()->take($this->limit)->get();
        $latest_blogs = Blog::latest()->take($this->limit)->get();
        return view('frontend.page.home',compact('latest_posts','premium_posts','vip_posts','latest_blogs'));
    }

    public function getBlogs(){
        $blogs = Blog::orderBy('id','desc')->paginate($this->paginate);
        return view('frontend.blog.index',compact('blogs'));
    }

    public function showBlog($slug){
        $blog = Blog::where('slug',$slug)->firstOrFail();
        return view('frontend.blog.show',compact('blog'));
    }

    public function getContact(){
        return view('frontend.page.contact');
    }

    public function postContact(ContactRequest $request){
        Contact::create($request->all());
        return back()->with('success','Gửi liên hệ thành công!');
    }

}
