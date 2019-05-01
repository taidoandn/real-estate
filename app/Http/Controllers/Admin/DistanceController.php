<?php

namespace App\Http\Controllers\Admin;

use App\Models\Distance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.distance.index');
    }

    public function getDistances(){
        $distances = Distance::query();
        return DataTables::of($distances)
                ->addColumn('action',function ($distance){
                    return view('backend.distance._action',compact('distance'));
                })
               ->make(true);
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
            'name' => 'required|unique:distances,name'
        ]);
        Distance::create($request->all());
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
        $distance = Distance::findOrFail($id);
        return response()->json($distance, 200);
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
            'name' => 'required|unique:distances,name,'.$id,'id'
        ]);
        $distance = Distance::findOrFail($id);
        $distance->update($request->all());
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
        Distance::destroy($id);
        return "Xóa thành công";
    }
}
