<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

}
