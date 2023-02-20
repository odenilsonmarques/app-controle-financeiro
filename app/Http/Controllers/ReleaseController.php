<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateReleaseFormRequest;
use App\Models\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
   
    public function create() 
    { 
        // dd('ReleaseController@create'); 
        return view('releases.add');
    }

    public function store(StoreUpdateReleaseFormRequest $request)
    {
        // dd($request->all());
        Release::create($request->all());
    }
}
