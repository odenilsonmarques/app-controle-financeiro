<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;

class FilterReleaseController extends Controller
{
    private $totalPage = 3;
    

    public function filter(Request $request, Release $release)//passando o objeto Release, pois vai ser preciso recuperá-lo no metodo criado na model
    {
        $dataForm = $request->except('_token');//não exibindo o token sa requisição
        $releases = $release->search($dataForm,$this->totalPage);

        // $selectmonths = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julio', 'Agosto', 'Setembor', 'Outubro', 'Novembro', 'Dezembro'];
    
        return view('releases.index', compact('releases', 'dataForm', ));
    }

}

