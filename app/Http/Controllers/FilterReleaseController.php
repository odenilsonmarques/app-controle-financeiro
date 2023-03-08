<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;

class FilterReleaseController extends Controller
{
    private $totalPage = 2;

    //nesse caso foi melhor deixar esse metodo nesse controller, pois este se relaciona direto com metodo abaixo, poderia ser feito de uma outra forma
    public function index(Release $release)
    {
        $releases = Release:: paginate($this->totalPage);
        return view('releases.index',compact('releases'));
    }


    public function search(Request $request, Release $release)
    {
        // dd('FilterReleaseController@search');
        // dd($request->all());
        // $dataForm = $request->except('_token');//não exibindo o token sa requisição
        $dataForm = $request->all();
        $releases = $release->search($dataForm, $this->totalPage);
        // dd($request->$releases);
        return view('releases.index', compact('releases'));
    }
}
