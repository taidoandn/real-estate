<?php

namespace App\Http\Controllers\Api;

use App\Models\Distance;
use Illuminate\Http\Request;
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
        return response()->json(Distance::all(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function show(Distance $distance)
    {
        return response()->json($distance,200);
    }
}
