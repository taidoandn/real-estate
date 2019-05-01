<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::with('post')->findOrFail($id);
        return response()->json($report, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
    }

    public function getReports(Request $request){
        if ($request->ajax()) {
            $reports = Report::query();
            return  DataTables::of($reports)
                        ->addColumn('action',function ($report){
                            return view('backend.report._action',compact('report'));
                        })
                        ->editColumn('reason',function($report){
                            return "<span class='label label-warning'>".ucwords($report->reason)."</span>";
                        })
                        ->rawColumns(['action', 'reason'])
                        ->make(true);
        }
    }
}
