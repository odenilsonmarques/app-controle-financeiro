<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateReleaseFormRequest;
use App\Models\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    private $totalPage = 5;

    public function index(Release $release)
    {
        $releases = Release::paginate($this->totalPage);                          
        return view('releases.index',compact('releases'));
    }

    public function create() 
    { 
        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        return view('releases.create',compact('months'));
    }

    public function store(StoreUpdateReleaseFormRequest $request)
    {
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

        $releases->update($request->all());
        return redirect()->route('releases.index')
        ->with('messageEdit', 'Lançamento atualizado com sucesso !');
    }

    public function destroy($id)
    {
        if(!$releases = Release::find($id))
            return redirect()->route('releases.index');

        $releases->delete();
        return redirect()->route('releases.index')
        ->with('messageDestroy', 'Lançamento excluído com sucesso !');
    }
}

