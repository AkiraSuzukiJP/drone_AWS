<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlightRecord;

class FlightRecordController extends Controller
{
    //
    function index(){
        $flight_records = FlightRecord::all();
        return view("flight_records.index", compact("flight_records"));
    }
}
