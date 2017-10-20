<?php

namespace App\Http\Controllers;

use App\Scans;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Blockings;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{

    public function getReports(){
        //first
        $lava = new Lavacharts;
        $votes  = $lava->DataTable();
        $this->getTrafficFlow();
        $votes->addStringColumn('Traffic of Gates')
            ->addNumberColumn('Gates Traffic')
            ->addRow(['Phase 1 Front',  $this->dateTraffic('Phase 1 Front')])
            ->addRow(['Phase 1 Back',  $this->dateTraffic('Phase 1 Back')])
            ->addRow(['Phase 2 Main',  $this->dateTraffic('Phase 2 Main')])
            ->addRow(['Phase 2 Library', $this->dateTraffic('Phase 2 Library')]);

        $lava->BarChart('Votes', $votes);


        $lava1 = new Lavacharts;
        $reasons = $lava1->DataTable();

        //Carbon::parse('created_at')->toDayDateTimeString()

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(array('Check Reviews', 5))
            ->addRow(array('Watch Trailers', 2))
            ->addRow(array('See Actors Other Work', 4))
            ->addRow(array('Settle Argument', 89));


        $donutchart = $lava->DonutChart('IMDB', $reasons, [
            'title' => 'Traffic flow'
        ]);

        //third
        $blocked_users = Blockings::with(['student','staff'])->get();



        return view('reports', [
            'lava'      => $lava,
            'lava1'      => $lava1,
            'blocked_users' => $blocked_users
        ]);

    }

    public function dateTraffic($gateName){
        $gateTraffics = Scans::with('staff')->get();
        $total = 0;
        foreach ($gateTraffics as $gateTraffic)
        {
            if($gateTraffic->staff->gate->name == $gateName){
                $total += 1;
            }
        }
        return $total;
    }


    public function getTrafficFlow(){
        $dailyData = DB::table('scans')
            ->select('created_at', DB::raw('count(*) as views'))
            ->groupBy('created_at')
            ->get();
        //dd($dailyData);
        return $dailyData;
    }

}
