<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Convenience;

class SearchController extends Controller
{
    private $paginate = 6;
    public function getSearch(){
        return view('frontend.search.search');
    }

    public function postSearch(Request $request){
        $query = Post::query()->with('detail','district.city','conveniences','property_type')->isPublished();
        $query->when($request->city_id, function ($q){
            $q->whereHas('district.city',function ($q){
                return $q->where('id',request()->city_id);
            });
        });
        $query->when($request->district_id , function ($q){
            $q->whereHas('district',function ($q){
                return $q->where('id',request()->district_id);
            });
        });
        $query->when($request->convenience , function ($q){
            $q->whereHas('conveniences',function ($q){
                $q->whereIn('id',request()->convenience);
            });
        });
        $query->when($request->property_type , function ($q){
            $q->whereHas('property_type',function ($q){
                $q->where('name',request()->property_type);
            });
        });
        $query->when($request->q , function ($q) use($request){
            $q->where('title','LIKE',"%$request->q%");
        });
        $query->when($request->purpose , function ($q) use($request){
            $q->where('purpose',$request->purpose);
        });
        $query->when($request->sort , function ($q) use($request){
            switch ($request->sort) {
                case 'latest':
                    $q->orderBy('created_at','desc');
                    break;
                case 'price_asc':
                    $q->orderBy('price','asc');
                    break;
                case 'price_desc':
                    $q->orderBy('price','desc');
                    break;
                default:
                    $q->orderBy('id','desc');
                    break;
            }
        });
        $sort = $request->sort;
        $grid    = $request->gridView === 'false' ? 'false' : 'true';
        $keyword = $request->q;
        $posts   = $query->paginate($this->paginate);
        return view('frontend.search._data',compact('posts','keyword','grid','sort'))->render();
    }


}
