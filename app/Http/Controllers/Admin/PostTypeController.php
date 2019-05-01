<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
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
        return view('backend.post_type.index');
    }

    public function getPostTypes(){
        $post_types = PostType::query();
        return DataTables::of($post_types)
                ->addColumn('action',function ($post_type){
                    return view('backend.post_type._action',compact('post_type'));
                })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:post_types,name',
            'description' => 'required',
            'price'       => 'required|numeric',
        ]);
        PostType::create($request->all());
        return "Thêm thành công";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_type = PostType::findOrFail($id);
        return response()->json($post_type, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'        => 'required|unique:post_types,name,'.$id, 'id',
            'description' => 'required',
            'price'       => 'required|numeric',
        ]);
        $post_type = PostType::findOrFail($id);
        $post_type->update($request->all());
        return "Cập nhật thành công!!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostType::destroy($id);
        return "Xóa thành công";
    }
}
