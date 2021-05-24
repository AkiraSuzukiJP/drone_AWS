<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aircraft;
use App\Http\Resources\AircraftForList as AircraftForListResource;

class AircraftController extends Controller
{
    //
    function index(){
        $aircrafts = Aircraft::all();
        //return view("aircrafts.index", compact("aircrafts"));
        return AircraftForListResource::collection($aircrafts);
    }
}
