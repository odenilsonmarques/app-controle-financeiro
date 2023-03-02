<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateReleaseFormRequest;
use App\Models\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    public function index()
    {
        $releases = Release:: all();
        return view('releases.index',compact('releases'));
        // dd($releases);
    }
   
    public function create() 
    { 
        // dd('ReleaseController@create'); 
        return view('releases.create');
    }

    public function store(StoreUpdateReleaseFormRequest $request)
    {
        // dd($request->all());
        Release::create($request->all());
        return redirect()->route('releases.index')
        ->with('messageCreate', 'Lançamento cadastrado com sucesso !');
    }

    public function edit($id)
    {
        $selectedMonths = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julio', 'Agosto', 'Setembor', 'Outubro', 'Novembro', 'Dezembro'];
        $selectedReleases = ['Despesa', 'Receita'];

        if(!$releases = Release::find($id))
            return redirect()->route('releases.edit');

        return view('releases.edit', compact('releases', 'selectedReleases','selectedMonths'));
    }

    public function update(StoreUpdateReleaseFormRequest $request, $id)
    {
        if(!$releases = Release::find($id))
            return redirect()->route('releases.index');

        // dd($request->all());
        $releases->update($request->all());
        return redirect()->route('releases.index')
        ->with('messageEdit', 'Lançamento atualizado com sucesso !');
    }
}
