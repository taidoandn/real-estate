<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{

    public function __construct(){
        $this->middleware('jwt.verify', ['except' => ['index','show','posts','postById']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PropertyType::get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required'
        ]);
        $propertyType = PropertyType::create($request->only('name'));
        return response()->json($propertyType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyType $propertyType)
    {
        return response()->json($propertyType, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyType $propertyType)
    {
        $propertyType->update($request->all());
        return response()->json($propertyType, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return response()->json(null, 204);
    }

    public function posts(Request $request,PropertyType $propertyType){
        $posts = $propertyType->posts;
        return response()->json($posts, 200);
    }
    public function postById(PropertyType $propertyType,Post $post){
        $post = $propertyType->posts->find($post);
        if (is_null($post)) {
            return response()->json(null, 404);
        }
        return response()->json($post, 200);
    }
}
