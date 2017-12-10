<?php

namespace App\Http\Controllers;

use App\Scans;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Blockings;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Redirect;
use Validator;


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
            ->addRow(array('Phase 1 Front', $this->dateTraffic('Phase 1 Front')))
            ->addRow(array('Phase 1 Back', $this->dateTraffic('Phase 1 Back')))
            ->addRow(array('Phase 2 Main', $this->dateTraffic('Phase 2 Main')))
            ->addRow(array('Phase 2 Library', $this->dateTraffic('Phase 2 Library')));


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

    public function getAnalytics(){
        $analytica = Blockings::with(['student','staff'])->whereBetween('created_at', ['2017-08-10', '2017-12-10'])->get();
        //dd($analytica);
        return view('analytics',['analytica '=>$analytica]);
    }

    public function postAnalytics(Request $request){
//        $rules = [
//            'start_date' => 'required',
//            'report_type' => 'required',
//            'end_date' => 'required',
//        ];
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return back()->withErrors($validator)->withInput();
//        }



        $start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');
        $report_type = $request->input('report_type');

        if($report_type == "Blockages"){
            $analytica = Blockings::with(['student','staff'])->whereBetween('created_at', [$start_date, $end_date])->get();
            return view('analytics',['analytica '=>$analytica]);

        }elseif ($report_type == "Number of Scans"){

            $analytica  = Scans::with('staff','student')->whereBetween('created_at', [$start_date, $end_date])->get();
            return view('analytics', ['analytica ' => $analytica]);

        }else {
            $analytica = Blockings::with(['student','staff'])->whereBetween('created_at', [$start_date, $end_date])->get();
            return view('analytics',['analytica '=>$analytica]);
        }

    }




}
