<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aircraft;

class AircraftController extends Controller
{
    //
    function index(){
        $aircrafts = Aircraft::all();
        return view("aircrafts.index", compact("aircrafts"));
    }
}
