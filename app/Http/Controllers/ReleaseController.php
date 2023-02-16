<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReleaseController extends Controller
{
   
    public function create() 
    { 
        // dd('ReleaseController@create'); 
        return view('releases.add');
    }
}
