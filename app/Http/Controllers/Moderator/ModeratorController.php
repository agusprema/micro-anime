<?php

namespace App\Http\Controllers\moderator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use App\Charts\UserChart;
use Analytics;
use App\User;

class ModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = collect([]); // Could also be an array
        $data2 = collect([]);
        $data3 = collect([]);
        $data4 = collect([]);
        $data6 = collect([]);
        $data7 = collect([]);
        $color = array("#27c8a0","#9172cf","#6f587a","#6a5854","#6ad1e9","#1b3ae3","#dea809","#d175fc","#d290b3","#704230","#5a81d7","#bbff4c","#d988a4","#3f0183","#69e1f5","#e90f6d","#a00dc6","#12e15c","#69db99","#01955b","#dd76af","#eaf661 ","#278297","#68831b","#78e8d1","#06f54b","#84b418","#a10220","#bedf91","#4b5ea0","#2dd033","#5c6746","#f829d4","#6f1ddf","#e97bea","#8c90b7","#29f5cc","#3d7313","#13eced","#bc501a","#569e82","#170e7a");

        $startDate = Carbon::now()->subMonth();
        $endDate = Carbon::now();

        for ($days_backwards = 01; $days_backwards <= date('n'); $days_backwards++) {
            // Could also be an array_push if using an array rather than a collection.
            $data->push(User::whereYear('created_at', date('Y'))->whereMonth('created_at', $days_backwards)->count());
            $date=date_create(date('Y')."-".$days_backwards."-1");
            $data2->push(date_format($date,"F"));
        }

        for ($days_backwards = 2; $days_backwards >= 0; $days_backwards--) {
            // Could also be an array_push if using an array rather than a collection.
            $data3->push(User::whereYear('created_at', date('Y')-$days_backwards)->count());
            $data4->push(date('Y')-$days_backwards);
        }

        foreach(Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDate)) as $data5){
            $data6->push($data5['pageViews']);
            $date=date_create($data5['date']);
            $data7->push(date_format($date,"j"));
        }


        $chart = new UserChart;
        $chart->labels($data2->values());
        $chart->dataset('User This Year', 'line', $data->values())->color($color)->backgroundColor($color);
        $chart->options([
            'tooltips' => ['intersect' => false,
                'mode' => 'index'
            ],
            'hover' => [
                'mode' => 'nearest',
                'intersect' => false,
                'hoverBorderColor' => $color,
                'hoverBackgroundColor' => $color
            ]
        ]);

        $chart2 = new UserChart;
        $chart2->labels($data4->values());
        $chart2->dataset('User This Year', 'doughnut', $data3->values())->color($color)->backgroundColor($color);
        $chart2->options([
            'tooltips' => ['intersect' => false,
                'mode' => 'index'
            ],
            'hover' => [
                'mode' => 'nearest',
                'intersect' => false,
                'hoverBorderColor' => $color,
                'hoverBackgroundColor' => $color
            ]
        ]);

        $chart3 = new UserChart;
        $chart3->labels($data7->values());
        $chart3->dataset('Visitor this Day', 'line', $data6->values())->color($color)->backgroundColor($color);
        $chart3->options([
            'tooltips' => ['intersect' => false,
                'mode' => 'index'
            ],
            'hover' => [
                'mode' => 'nearest',
                'intersect' => false,
                'hoverBorderColor' => $color,
                'hoverBackgroundColor' => $color
            ]
        ]);

        /* dd(Analytics::getAnalyticsService()->data_realtime->get('ga:'.env('ANALYTICS_VIEW_ID'), 'rt:activeUsers')->totalsForAllResults['rt:activeUsers']); */

        return view('moderator.index', ['chart' => $chart, 'chart2' => $chart2, 'chart3' => $chart3]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
