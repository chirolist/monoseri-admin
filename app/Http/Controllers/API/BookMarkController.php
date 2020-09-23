<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\BookMark;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BookMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = \DB::table('t_bookmark');

        $select = <<<SQL
SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(url, '/', 3), '://', -1), '/', 1), '?', 1) AS domain
SQL;

        $sub->select(\DB::raw($select));

        $summary = \DB::table(\DB::raw("({$sub->toSql()}) as sub") )
            ->select(\DB::raw('count(sub.domain) as count, sub.domain'))
            ->groupBy('domain')
            ->orderBy('count', 'desc')
            ->limit(12)
            ->get();

        $total = \DB::table('t_bookmark')->count();

        $alive_count = \DB::table('t_bookmark')->where('status', "=", 1)->count();
        $dead_count  = \DB::table('t_bookmark')->where('status', "=", 2)->count();
        $notfound_count  = \DB::table('t_bookmark')->where('status', "=", 3)->count();
        $unknown_count   = \DB::table('t_bookmark')->where('status', "=", 0)->count();

        return response()->json([
            'status'    => 'success',
            'total'     => $total,
            'bookmarks' => $summary,
            'alive_count'    => $alive_count,
            'dead_count'     => $dead_count,
            'notfound_count' => $notfound_count,
            'unknown_count'  => $unknown_count,
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
