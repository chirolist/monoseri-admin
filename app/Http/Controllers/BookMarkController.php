<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        $query = \DB::table('t_bookmark as t1');

        $select = <<<SQL
t1.*,
CASE t1.status
  WHEN 1 THEN 'Alive'
  WHEN 2 THEN 'Dead'
  WHEN 3 THEN 'NotFound'
  WHEN 0 THEN 'Unknown'
END as status
SQL;

        $query->select(\DB::raw($select));

        if ($request->input('title')) {
            $query->where('title', 'like', '%'.$request->input('title').'%');
        }

        if ($request->input('url')) {
            $query->where('url', 'like', '%'.$request->input('url').'%');
        }

        if (!is_null($request->input('status'))) {
            $query->whereIn('status', $request->input('status'));
        }

        $bookmarks = $query->paginate(50);

        return view('bookmark.index', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'url'   => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $bookmark = BookMark::create([
            'url'    => $request->input('url'),
            'title'  => $request->input('title'),
            'status' => $request->input('status'),
        ]);

        \Session::flash('flash_message', '登録が完了しました');

        return redirect('/bookmark/'.$bookmark->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookMark  $bookMark
     * @return \Illuminate\Http\Response
     */
    public function show(BookMark $bookmark, Client $client)
    {
//        $response = $client->request('GET', $bookmark->url);

//        echo $response->getStatusCode(); // 200
//echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
//echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        return view('bookmark.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookMark  $bookMark
     * @return \Illuminate\Http\Response
     */
    public function edit(BookMark $bookmark)
    {
        return view('bookmark.edit', compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookMark  $bookMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookMark $bookmark)
    {
        $validator = \Validator::make($request->all(), [
            'url'   => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/bookmark/'.$bookmark->id.'/edit')->withInput()->withErrors($validator);
        }

        $bookmark->update([
            'url'    => $request->input('url'),
            'title'  => $request->input('title'),
            'status' => $request->input('status'),
        ]);

        \Session::flash('flash_message', '更新が完了しました');

        return redirect('/bookmark/'.$bookmark->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookMark  $bookMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookMark $bookmark)
    {
        $bookmark->delete();

        \Session::flash('flash_message', '更新が完了しました');

        return redirect('/bookmark');
    }
}
