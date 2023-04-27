<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateReleaseFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Release;



class ReleaseController extends Controller
{
    private $totalPage = 5;

    public function index(Release $release)
    {
        if(Auth::check()){
            $releases = Auth::user()->releases()->paginate($this->totalPage);                          
            return view('releases.index',compact('releases'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create() 
    { 
        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        return view('releases.create',compact('months'));
    }

    public function store(StoreUpdateReleaseFormRequest $request)
    {
        // Adiciona o ID do usuário ao array de dados da solicitação
        $request->merge(['user_id' => auth()->id()]);
        
        Release::create($request->all());
        return redirect()->route('releases.index')
        ->with('messageCreate', 'Lançamento cadastrado com sucesso !');
    }
    
    public function edit($id)
    {
        $selectedMonths = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julio', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
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

