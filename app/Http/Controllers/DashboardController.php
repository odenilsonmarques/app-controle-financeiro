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
                ->select('month', DB::raw('SUM(CASE WHEN release_type = "Receita" THEN amount ELSE 0 END) as revenue'), DB::raw('SUM(CASE WHEN release_type = "Despesa" THEN amount ELSE 0 END) as expense'))
                ->groupBy('month')
                ->orderByRaw('FIELD(month, "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro")')
                ->get();

                $revenues = [];
                $expenses = [];

                foreach ($months as $month) {
                    $searchedMonth = $searchMonthValues->firstWhere('month', $month);

                    if ($searchedMonth) {
                        $revenues[] = $searchedMonth->revenue;
                        $expenses[] = $searchedMonth->expense;
                    } else {
                        $revenues[] = 0;
                        $expenses[] = 0;
                    }
                }

            return view('dashboard.dashboard',[
            
                'totalReleases'=>$totalReleases,
                'totalRevenues'=>$totalRevenues,
                'totalExpenses'=>$totalExpenses,
                'sumRenevueValues'=>$sumRenevueValues,
                'sumExpenseValues'=>$sumExpenseValues,
                'months'=>$months,
                'revenues' =>$revenues,
                'expenses' =>$expenses,
            ]);

        }else {
            return redirect()->route('login');
        }
    }
}
