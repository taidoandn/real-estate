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
        $query = Post::query()->with('detail','district.city','conveniences','property_type','type')->isPublished();
        $query->when(request()->city_id, function ($q){
            $q->whereHas('district.city',function ($q){
                return $q->where('id',request()->city_id);
            });
        });
        $query->when(request()->district_id , function ($q){
            return $q->where('district_id',request()->district_id);
        });
        $query->when(request()->convenience , function ($q){
            $q->whereHas('conveniences',function ($q){
                $q->whereIn('id',request()->convenience);
            });
        });
        $query->when(request()->property_type , function ($q){
            $q->whereHas('property_type',function ($q){
                $q->where('slug',request()->property_type);
            });
        });
        $query->when(isset(request()->q) , function ($q){
            $q->where('title','LIKE',"%".request()->q."%");
            $q->orWhere('slug','LIKE',"%".request()->q."%");
        });
        $query->when(request()->min , function ($q){
            $q->where('price','>=',(int)request()->min);
        });
        $query->when(isset(request()->max) && request()->max > request()->min, function ($q){
            $q->where('price','<=',(int)request()->max);
        });
        $query->when(request()->purpose , function ($q){
            $q->where('purpose',request()->purpose);
        });
        $query->when(request()->sort , function ($q){
            $q->sort(request()->sort);
        });
        $sort    = $request->sort;
        $min     = $request->min;
        $max     = $request->max;
        $grid    = $request->gridView === 'grid' ? true : false;
        $keyword = $request->q;
        $posts   = $query->paginate($this->paginate);
        return view('frontend.search._data',compact('posts','keyword','grid','sort','min','max'))->render();
    }
}
