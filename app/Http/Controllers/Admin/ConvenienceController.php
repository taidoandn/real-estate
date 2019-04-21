<?php

namespace App\Http\Controllers\Admin;

use App\Models\Convenience;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ConvenienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.convenience.show');
    }

    public function getConveniences(){
        $conveniences = Convenience::query();
        return DataTables::of($conveniences)
                ->addColumn('action',function ($convenience){
                    return view('backend.convenience._action',compact('convenience'));
                })
                ->addColumn('type',function ($convenience){
                    return ucwords($convenience->type);
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
            'name' => 'required|unique:conveniences,name',
            'type' => 'required'
        ]);
        Convenience::create($request->all());
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
        $convenience = Convenience::findOrFail($id);
        return response()->json($convenience, 200);
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
            'name' => 'required|unique:conveniences,name,'.$id,'id',
            'type' => 'required'
        ]);
        $convenience = Convenience::findOrFail($id);
        $convenience->update($request->all());
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
        Convenience::destroy($id);
        return "Xóa thành công";
    }
}
