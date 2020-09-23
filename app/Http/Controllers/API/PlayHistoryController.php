<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\GamePlayHistory;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlayHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sum_total = \DB::table('t_game_play_history')->sum('total');
        $avg_total = \DB::table('t_game_play_history')->avg('total');
        $count     = \DB::table('t_game_play_history')->count();

        $select1 = <<<SQL
count(id) as cnt,
DATE_FORMAT(played_at, '%Y-%m') as played_at
SQL;

        $sub1 = \DB::table('t_game_play_history')
            ->select(\DB::raw($select1))
            ->groupBy(\DB::raw("DATE_FORMAT(played_at, '%Y-%m')"));

        $dataavg2019 = \DB::table(\DB::raw("({$sub1->toSql()}) as sub1"))->whereBetween('sub1.played_at', ['2019-01', '2019-12'])->get();
        $lineList = [
            '2019-01' => 0,
            '2019-02' => 0,
            '2019-03' => 0,
            '2019-04' => 0,
            '2019-05' => 0,
            '2019-06' => 0,
            '2019-07' => 0,
            '2019-08' => 0,
            '2019-09' => 0,
            '2019-10' => 0,
            '2019-11' => 0,
            '2019-12' => 0,
        ];
        foreach($dataavg2019 as $val) {
            $lineList[$val->played_at] = $val->cnt;
        }


        $select2 = <<<SQL
SUM(total) as total,
DATE_FORMAT(played_at, '%Y-%m') as played_at
SQL;

        $sub2 = \DB::table('t_game_play_history')
            ->select(\DB::raw($select2))
            ->groupBy(\DB::raw("DATE_FORMAT(played_at, '%Y-%m')"));

        $month_average_total = \DB::table(\DB::raw("({$sub2->toSql()}) as sub2"))->avg('total');

        $max_month_sum_total = \DB::table(\DB::raw("({$sub2->toSql()}) as sub2"))->max('total');

        $max_month_played_at = \DB::table(\DB::raw("({$sub2->toSql()}) as sub2"))->orderBy('total', 'desc')->first()->played_at;

        $data2019 = \DB::table(\DB::raw("({$sub2->toSql()}) as sub2"))->whereBetween('sub2.played_at', ['2019-01', '2019-12'])->get();
        $barList = [
            '2019-01' => 0,
            '2019-02' => 0,
            '2019-03' => 0,
            '2019-04' => 0,
            '2019-05' => 0,
            '2019-06' => 0,
            '2019-07' => 0,
            '2019-08' => 0,
            '2019-09' => 0,
            '2019-10' => 0,
            '2019-11' => 0,
            '2019-12' => 0,
        ];
        foreach($data2019 as $val) {
            $barList[$val->played_at] = $val->total;
        }

        $summary = [
            'sum_total' => $sum_total,
            'avg_total' => round($avg_total),
            'count' =>$count,
            'month_average_total' => round($month_average_total),
            'max_month' => [
                'sum_total' => $max_month_sum_total,
                'played_at' => Carbon::parse($max_month_played_at)->format('Y年m月'),
            ],
            'bar' => [
                'data' => array_values($barList),
            ],
            'line' => [
                'data' => array_values($lineList),
            ]
        ];

        return response()->json([
            'status'    => 'success',
            'summary' => $summary,
        ], 200);
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
