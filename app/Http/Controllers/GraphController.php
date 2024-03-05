<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function showGraph()
    {
        $userCounts = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                          ->whereYear('created_at', date('Y'))
                          ->groupBy('month')
                          ->orderBy('month')
                          ->get();

        $labels = [];
        $data = $userCounts->pluck('count')->toArray();

        foreach ($userCounts as $userCount){
            $month = date('F',mktime(0,0,0,$userCount->month,1));
            $labels[]=$month;
        }
        
        return view('graphs', compact('labels', 'data'));
    }
}
