<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $limit = 6;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_posts = Post::with('detail','district.city','type')->isPublished()->latest()->take($this->limit)->get();
        return view('frontend.page.home',compact('latest_posts'));
    }

    public function getBlogs(){
        $blogs = Blog::latest()->get();
        return view('frontend.blog.index',compact('blogs'));
    }

    public function showBlog($slug){
        $blog = Blog::where('slug',$slug)->firstOrFail();
        return view('frontend.blog.show',compact('blog'));
    }

    public function getContact(Request $request){
        return view('frontend.page.contact');
    }

    public function postContact(){

    }

}
