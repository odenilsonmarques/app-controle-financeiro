<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;

class FilterReleaseController extends Controller
{
    public function search(Request $request, Release $release)
    {
        // dd('FilterReleaseController@search');
        $dataForm = $request->except('_token');//não exibindo o token sa requisição
        $releases = $release->search($dataForm);
        return view('releases.index', compact('releases'));
    }
}
