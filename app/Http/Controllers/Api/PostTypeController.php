<?php

namespace App\Http\Controllers\Api;

use App\Models\PostType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PostType::all(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostType  $postType
     * @return \Illuminate\Http\Response
     */
    public function show(PostType $postType)
    {
        return response()->json($postType, 200);
    }
}
