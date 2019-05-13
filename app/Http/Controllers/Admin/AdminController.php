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
        // $posts = Post::with('district.city','property_type','user')->where('id' ,'>=' ,1)->get();
        // foreach ($posts as $key => $post) {
        //     $post->update([
        //         'title'       => "{$post->purpose_format} {$post->property_type->name} tại {$post->district->name} / {$post->district->city->name}",
        //         'description' => "<b>Thông tin dự án:</b>
        //         - Vị trí: {$post->district->name} / {$post->district->city->name}.
        //         - Quy mô dự án {$post->title}: {$post->area} m<sup>2</sup>.
        //         - Chủ đầu tư và phân phối: {$post->user->name}.
        //         - Hạ tầng: Hoàn thiện 100%, đường nội bộ 9 - 15m, điện âm, nước máy, nước thủy cục, hệ thống nước mưa - nước thải riêng biệt, hệ thống viễn thông đầy đủ...
        //         - Tiện ích nội khu: Trường mầm non, công viên, khu thương mại, dịch vụ và hồ cảnh quan..."
        //     ]);
        // }
        // die('success');


        $blogs = Blog::get();
        foreach ($blogs as $key => $blog) {
            $blog->update=([
                'content' => ""
            ]);
        }

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
