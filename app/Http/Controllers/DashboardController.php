<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash(){
        // dd('DashboardController');

        $totalReleases = Release::count();

        $totalRevenues = Release::where('release_type', '=', 'Receita')->count();

        $totalExpenses = Release::where('release_type', '=', 'Despesa')->count();

        $sumRenevueValues = Release::where('release_type', '=', 'Receita')->sum('amount');

        $sumExpenseValues = Release::where('release_type', '=', 'Despesa')->sum('amount');

        // dd($allRecipes);

        return view('dashboard.dashboard',[
            'totalReleases'=>$totalReleases,
            'totalRevenues'=>$totalRevenues,
            'totalExpenses'=>$totalExpenses,
            'sumRenevueValues'=>$sumRenevueValues,
            'sumExpenseValues'=>$sumExpenseValues,
        ]);

    }
}
