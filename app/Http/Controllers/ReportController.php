<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $datas = Release::all();

        $soma = Release::sum('amount');

        // dd($datas);
        return \PDF::loadView('reports.report', compact('datas', 'soma'))
        ->stream('lancamentos.pdf');
    }

    

   
}
