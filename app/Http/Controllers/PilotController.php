<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pilot;

class PilotController extends Controller
{
    //
    function index(){
        $pilots = Pilot::all();
        return view("pilots.index", compact("pilots"));
    }
}
