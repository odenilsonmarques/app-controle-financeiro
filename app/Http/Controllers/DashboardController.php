<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;
use App\Charts\ReportsChart;
use DB;

class DashboardController extends Controller
{

    public function dash(){
        
        $totalReleases = Release::count();

        $totalRevenues = Release::where('release_type', '=', 'Receita')->count();

        $totalExpenses = Release::where('release_type', '=', 'Despesa')->count();

        $sumRenevueValues = Release::where('release_type', '=', 'Receita')->sum('amount');

        $sumExpenseValues = Release::where('release_type', '=', 'Despesa')->sum('amount');

        $meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
        $dataset = DB::table('releases')
        ->select(DB::raw('(month) as mes'), 'month', DB::raw('SUM(amount) as total'))
        ->groupBy('mes', 'month')
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

        

        // dd($valores_meses);

    

        foreach($dataset as $valor){
            $busca[$valor->mes] = $valor->total;
        }

        // dd($busca);
        
        
       

        return view('dashboard.dashboard',[
           
            'totalReleases'=>$totalReleases,
            'totalRevenues'=>$totalRevenues,
            'totalExpenses'=>$totalExpenses,
            'sumRenevueValues'=>$sumRenevueValues,
            'sumExpenseValues'=>$sumExpenseValues,
            'busca'=>$busca,
            'meses'=>$meses,

            
        ]);

    }

}
