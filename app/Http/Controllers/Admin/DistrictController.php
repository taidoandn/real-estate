<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::get();
        return view('backend.district.show',compact('cities'));
    }

    public function getDistricts(){
        $districts = District::query();
        return DataTables::of($districts)
                ->addColumn('action',function ($district){
                    return view('backend.district._action',compact('district'));
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
            'city_id' => 'required|exists:cities,id',
            'name'    => 'required|unique:districts,name'
        ]);
        District::create($request->all());
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
        $district = District::findOrFail($id);
        return response()->json($district, 200);
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
            'city_id' => 'required|exists:cities,id',
            'name' => 'required|unique:districts,name,'.$id,'id'
        ]);
        $district = District::findOrFail($id);
        $district->update($request->all());
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
        District::destroy($id);
        return "Xóa thành công";
    }
}
