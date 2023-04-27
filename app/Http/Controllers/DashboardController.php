<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;
use App\Charts\ReportsChart;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{

    public function dash()
    {
        if(Auth::check()){
            $totalReleases = Auth::user()->releases()->count();
            $totalRevenues = Auth::user()->releases()->where('release_type', '=', 'Receita')->count();
            $totalExpenses = Auth::user()->releases()->where('release_type', '=', 'Despesa')->count();
            $sumRenevueValues = Auth::user()->releases()->where('release_type', '=', 'Receita')->sum('amount');
            $sumExpenseValues = Auth::user()->releases()->where('release_type', '=', 'Despesa')->sum('amount');

            $months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
            $searchMonthValues = DB::table('releases')
            ->where('user_id', auth()->user()->id)
            ->select(DB::raw('(month) as monthAll'), 'month', DB::raw('SUM(amount) as total'))
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

            //definindo um valor padrão, caso não exista
            $datas = [];
            $data = $data ?? 0;

            foreach($searchMonthValues as $searchMonthValue){
                $datas[$searchMonthValue->monthAll] = $searchMonthValue->total;
            }

            return view('dashboard.dashboard',[
            
                'totalReleases'=>$totalReleases,
                'totalRevenues'=>$totalRevenues,
                'totalExpenses'=>$totalExpenses,
                'sumRenevueValues'=>$sumRenevueValues,
                'sumExpenseValues'=>$sumExpenseValues,
                'datas'=>$datas,
                'months'=>$months,
                
            ]);
        }else {
            return redirect()->route('login');
        }
    }
}
