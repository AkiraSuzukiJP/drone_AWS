<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InspectionRrecord;

class InspectionRrecordController extends Controller
{
    //
    function index(){
        $inspection_rrecords = InspectionRrecord::all();
        return view("inspection_rrecords.index", compact("inspection_rrecords"));
    }
}
