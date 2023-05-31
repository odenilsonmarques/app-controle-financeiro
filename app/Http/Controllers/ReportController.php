<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        if(Auth::check()){
            $datas = Auth::user()->releases;
            $sumExpenseValues = Auth::user()->releases()->where('release_type', '=', 'Despesa')->sum('amount');
            $sumRenevueValues = Auth::user()->releases()->where('release_type', '=', 'Receita')->sum('amount');
            $balance = $sumRenevueValues - $sumExpenseValues;

            return \PDF::loadView('reports.report', compact('datas', 'sumExpenseValues', 'sumRenevueValues','balance'))
            ->stream('lancamentos.pdf');
        }else{
            return redirect()->route('login');
        }
    }
}
