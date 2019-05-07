<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Post;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pending_posts         = Post::where('status','pending')->orderBy('created_at','desc')->get();
        $total_posts           = Post::get()->count();
        $published_posts_count = Post::isPublished()->count();
        $expired_posts_count   = Post::IsExpired()->count();
        $reports               = Report::with('post')->orderBy('id','desc')->get();
        $total_accounts        = User::all()->count();
        $new_accounts          = User::whereDate('created_at',\Carbon\Carbon::today())->count();
        $total_blogs           = Blog::all()->count();
        return view('backend.page.dashboard',compact('total_posts','pending_posts','published_posts_count','expired_posts_count','total_accounts','reports','new_accounts','total_blogs'));
    }

}
