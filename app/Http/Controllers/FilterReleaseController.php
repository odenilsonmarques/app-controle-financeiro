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

        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    
        // logica para buscar os valores de cada mes
        
        // foreach($months as $sum){
        //     $sum = Release::where('month', '=',  $months[0])->sum('amount');
        //     dd($sum);
        // }

        return view('releases.index', compact('releases', 'dataForm','months'));
    }

}

