<?php

namespace App\Http\Controllers;
use App\Charts\ReportsChart;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function chart()
    {
        $chart = new ReportsChart;
        $chart ->Title('My nice chart');
        $chart ->Labels(['First', 'Second', 'Third']);
        $chart  ->dataset('Users by trimester', 'line', [10, 25, 13]);
        // $chart ->setDimensions(1000,500);
        // $chart ->render();
        return view('chart.chart', [ 'chart' => $chart ] );
            
        
       

        
    }
}
