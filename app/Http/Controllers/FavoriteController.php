<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function __invoke(Request $request){
        $post = Post::where('slug',$request->slug)->firstOrFail();
        if ($post->isFavorited()) {
            $post->favorites()->detach(auth()->id());
            return 0;
        }else{
            $post->favorites()->attach(auth()->id());
            return 1;
        }
    }
}
