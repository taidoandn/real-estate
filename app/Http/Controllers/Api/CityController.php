<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(City::all(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return response()->json($city, 200);
    }

    public function districts(City $city){
        $districts = $city->districts;
        return response()->json($districts, 200);
    }
    public function districtById(City $city,District $district){
        $district = $city->districts->find($district);
        if (is_null($district)) {
            return response()->json(null, 404);
        }
        return response()->json($district, 200);
    }

}
