<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateReleaseFormRequest;
use App\Models\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    private $totalPage = 3;

    public function index(Release $release)
    {
        $releases = Release:: paginate($this->totalPage);
        return view('releases.index',compact('releases'));
    }

    public function create() 
    { 
        return view('releases.create');
    }

    public function store(StoreUpdateReleaseFormRequest $request)
    {

        $teste = Release::create($request->all());
        // dd($teste);

        // dd($teste->$request->all());
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

