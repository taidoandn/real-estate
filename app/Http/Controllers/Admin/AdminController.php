<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
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
        $posts = Post::get();
        $pending_posts = $posts->filter(function($post){
            return $post->status == 'pending';
        });

        $published_posts = $posts->filter(function($post){
            return $post->isPublished();
        });

        $expired_posts = $posts->filter(function($post){
            return $post->status == 'expired';
        });
        return view('backend.page.dashboard',compact('posts','pending_posts','published_posts','expired_posts'));
    }

}
