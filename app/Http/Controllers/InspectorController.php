<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inspector;

class InspectorController extends Controller
{
    //
    function index(){
        $inspectors = Inspector::all();
        return view("inspectors.index", compact("inspectors"));
    }
}
