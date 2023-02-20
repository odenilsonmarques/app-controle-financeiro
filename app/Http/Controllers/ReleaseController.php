<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Release;

class ReleaseController extends Controller
{
   
    public function create() 
    { 
        // dd('ReleaseController@create'); 
        return view('releases.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Release::create($request->all());
    }
}
