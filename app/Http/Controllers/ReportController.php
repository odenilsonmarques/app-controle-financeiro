<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request){
        $datas = Release::all();
        return \PDF::loadView('reports.report', compact('datas'))
        ->stream('lancamentos.pdf');
    }

    // create method for sum the total of value releases

   
}
