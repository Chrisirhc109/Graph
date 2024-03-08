<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cron\MonthField;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function showGraph() //BAR CHART
    {

        //User model because it is the default when you create a new Laravel project
        //selectRaw because it can retrieve more complex queries in database.
        //MONTH(created_at) as month = take the MONTH of the "created_at" and make it as month
        //COUNT(*) as count = COUNT will count the number of row as placeholder then use it to insert user 
        //whereYear('created_at', date('Y')) = this condition use the current (date('Y')) year of "created_at". 
        
        $userCounts = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                          ->whereYear('created_at', date('Y'))
                          ->groupBy('month')
                          ->orderBy('month')
                          ->get();


        //Initializing an empty array allows you to later populate it with the names of the months
        $labels = [];

        $colors = ['#FF5733', '#33FF57', '#5733FF', '#FF33E6', '#33E6FF', '#FFA500', '#00FFFF', '#FF1493'];

        
        /*  $userCounts retrieves the data from the database based on the query conditions.

            pluck('count') insert data in the 'count' placeholder

            ->toArray() converts the extracted values into an array.*/
        $data = $userCounts->pluck('count')->toArray(); //$data = number of user for a specific month

        //foreach because it involve array
        //($userCounts as $userCount) is the same just a PHP thing to assign variable
        foreach ($userCounts as $userCount){

            //0,0,0 because it is not hardcoded and it is just a template for the argument
            //1 = day(by default 1)
            //0 = Year is not provided, so it defaults to the current year.
            $month = date('F',mktime(0,0,0,$userCount->month,1,0)); //mktime(hour, minute, second, month, day, year)
            $labels[]=$month;//insert the name of the month to the empty array placeholder  
        }

        return view('graphs', compact('labels', 'data','colors')); //compact = prepare data to be pass from the PHP to blade file
    }

    public function piechart() //PIE CHART
    {
        $userCountsPie = User::selectRaw('MONTH(created_at) as monthPie, COUNT(*) as countPie')
        ->whereYear('created_at',date('Y'))
        ->groupBy('monthPie')
        ->orderBy('monthPie')
        ->get();

        $labelsPie=[];
        $colorsPie=['#FF5733', '#33FF57', '#5733FF', '#FF33E6', '#33E6FF', '#FFA500', '#00FFFF', '#FF1493', '#8A2BE2', '#008080', '#800080'];

        $dataPie = $userCountsPie->pluck('countPie')->toArray();

        foreach($userCountsPie as $UserCountsPie)
        {
            $monthPie = date('F',mktime(0,0,0,$UserCountsPie->monthPie,1,0));
            $labelsPie[]=$monthPie;
        }

        return view('pieChart',compact('labelsPie', 'dataPie','colorsPie'));
    }

    public function linechart()//LINE CHART
    {
        $userCountsLine = User::selectRaw('MONTH(created_at) as monthLine, COUNT(*) as countLine')
        ->whereYear('created_at',date('Y'))
        ->groupBy('monthLine')
        ->orderBy('monthLine')
        ->get();

        $labelsLine=[];
        $colorsLine=['#FF5733'];
        $dataLine = $userCountsLine->pluck('countLine')->toArray();


        foreach($userCountsLine as $UserCountsLine)
        {
            $monthLine = date('F',mktime(0,0,0,$UserCountsLine->monthLine, 1,0));
            $labelsLine[]=$monthLine;
        }
        return view ('lineChart', compact( 'labelsLine', 'dataLine','colorsLine' ));
    }

    public function barchartGOOGLE()
    {
        $userCountsGoo = USer::selectRaw('MONTH(created_at) as monthGoogle, COUNT(*) as countGoogle')
        ->whereYear('created_at', date('Y'))
        ->groupBy('monthGoogle')
        ->orderBy('monthGoogle')
        ->get();

        $data = [['Month','Number of Users']];
        foreach ($userCountsGoo as $UserCountsGoogle){
            $monthName = date('F',mktime(0,0,0,$UserCountsGoogle->month,1));
            $data[] = [$monthName,$UserCountsGoogle->countGoogle];

        }
        return view('google-charts',compact('data')); 
    }
   
}
