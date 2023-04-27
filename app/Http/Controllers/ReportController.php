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
            $soma = Auth::user()->releases()->sum('amount');

            return \PDF::loadView('reports.report', compact('datas', 'soma'))
            ->stream('lancamentos.pdf');
        }else{
            return redirect()->route('login');
        }
        
    }
}
