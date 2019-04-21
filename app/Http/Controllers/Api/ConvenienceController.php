<?php

namespace App\Http\Controllers\Api;

use App\Models\Convenience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConvenienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Convenience::query();
        $query->when($request->type,function($q) use($request){
            return $q->where('type','LIKE', "%". $request->type."%");
        });

        $conveniences = $query->get();
        return response()->json($conveniences,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convenience  $convenience
     * @return \Illuminate\Http\Response
     */
    public function show(Convenience $convenience)
    {
        return response()->json($convenience,200);
    }
}
