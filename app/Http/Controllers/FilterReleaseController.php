<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;
use DB;

class FilterReleaseController extends Controller
{
    private $totalPage = 5;
    
    public function filter(Request $request, Release $release)//passando o objeto Release, pois vai ser preciso recuperá-lo no metodo criado na model
    {
        $dataForm = $request->except('_token');//não exibindo o token sa requisição
        $releases = $release->search($dataForm,$this->totalPage);
 
        $searchMonthValues = DB::table('releases')
        ->select(DB::raw('(month) as monthAll'), 'month', DB::raw('SUM(amount) as total'))
        // ->where('month', '=', $selectedMonths)
        ->groupBy('monthAll', 'month')
        ->orderBy(DB::raw('CASE (month)
                            WHEN "Janeiro" THEN 0
                            WHEN "Fevereiro" THEN 1
                            WHEN "Março" THEN 2
                            WHEN "Abril" THEN 3
                            WHEN "Maio" THEN 4
                            WHEN "Junho" THEN 5
                            WHEN "Julho" THEN 6
                            WHEN "Agosto" THEN 7
                            WHEN "Setembro" THEN 8
                            WHEN "Outubro" THEN 9
                            WHEN "Novembro" THEN 10
                            WHEN "Dezembro" THEN 11
                            END','asc'))
        ->orderBy('total', 'desc')
        ->get()
        ->toArray();

        foreach($searchMonthValues as $searchMonthValue){
            $datas[$searchMonthValue->monthAll] = $searchMonthValue->total;
        }
        
        return view('releases.index', compact('releases', 'dataForm','datas'));
    }

}

