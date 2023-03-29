<?php

namespace App\Http\Controllers;
use App\Charts\ReportsChart;
use App\Models\Release;
use Illuminate\Http\Request;
use DB;

class ReportsController extends Controller
{
    public function chart()
    {
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
        ->get();

        dd($dataset);

        //NA PROXIMA PRATICA, TENTAR ENTENDER PQ O ARRAY NÃO TA SEGUIDO A ORDEM NATURAL, VER ISSO NA HORA DEGUGAR
        // $dados = [];
        
        

        // return $dataset;


        // return view('dashboard.dashboard', compact('receita','despesa'));
        
    }
}
