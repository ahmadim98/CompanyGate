<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        //this just to simulate getting certificates from ERP system
        $statistics_data = [
            [
                'net_profit' => ['total_sales' => 1000, 'total_sales_percentage' => 10],
                'annual_profits' => ['total_sales' => 1000, 'total_sales_percentage' => 10],
                'monthly_profits' => ['total_sales' => 1000, 'total_sales_percentage' => 10],
                'net_loss' => ['total_loss' => 1000, 'total_loss_percentage' => 10],
                'chart' => [[
                    'nameen' => 'Orders',
                    'namear' => 'الطلبات',
                    'data' => [32, 66, 44, 55, 41, 24, 67, 22, 43, 32, 66, 44, 55, 41, 24, 67, 22, 43],
                ], [
                    'nameen' => 'Visitors',
                    'namear' => 'الزوار',
                    'data' => [7, 30, 13, 23, 20, 12, 8, 13, 27, 7, 30, 13, 23, 20, 12, 8, 13, 27]
                ]],
                'sectors' => [
                     [
                    'name' => 'Computers & Accessories',
                    'growth' => 55,
                ], 
                [
                    'name' => 'Phones & Accessories',
                    'growth' => 45,
                ],
                ],
            ],
        ];
        //return response()->json($certificates);
        return view('statistics',compact('statistics_data'));
    }
}
