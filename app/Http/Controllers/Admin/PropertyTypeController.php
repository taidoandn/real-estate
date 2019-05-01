<?php

namespace App\Http\Controllers\Admin;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.property-type.index');
    }

    public function getPropertyTypes(){
        $property_types = PropertyType::query();
        return DataTables::of($property_types)
                ->addColumn('action',function ($property_type){
                    return view('backend.property-type._action',compact('property_type'));
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
            'name'    => 'required|unique:property_types,name'
        ]);
        PropertyType::create($request->all());
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
        $property_type = PropertyType::findOrFail($id);
        return response()->json($property_type, 200);
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
            'name' => 'required|unique:property_types,name,'.$id,'id'
        ]);
        $property_type = PropertyType::findOrFail($id);
        $property_type->update($request->all());
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
        PropertyType::destroy($id);
        return "Xóa thành công";
    }
}
