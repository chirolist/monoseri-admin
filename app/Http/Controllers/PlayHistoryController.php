<?php

namespace App\Http\Controllers;

use App\Model\GamePlayHistory;
use Illuminate\Http\Request;

class PlayHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = GamePlayHistory::query();

        if ($request->input('played_at')) {
            $query->where('played_at', '=', $request->input('played_at'));
        }

        $playhistories = $query->paginate(30);

        return view('playhistory.index', compact('playhistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playhistory.create');
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
            'total'     => 'required|integer',
            'played_at' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $playhistory = GamePlayHistory::create([
            'total'     => $request->input('total'),
            'played_at' => $request->input('played_at'),
        ]);

        \Session::flash('flash_message', '登録が完了しました');

        return redirect('/playhistory/'.$playhistory->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GamePlayHistory  $playhistory
     * @return \Illuminate\Http\Response
     */
    public function show(GamePlayHistory $playhistory)
    {
        return view('playhistory.show', compact('playhistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GamePlayHistory  $playhistory
     * @return \Illuminate\Http\Response
     */
    public function edit(GamePlayHistory $playhistory)
    {
        return view('playhistory.edit', compact('playhistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GamePlayHistory  $playhistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GamePlayHistory $playhistory)
    {
        $validator = \Validator::make($request->all(), [
            'total'     => 'required|integer',
            'played_at' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('/playhistory/'.$playhistory->id.'/edit')->withInput()->withErrors($validator);
        }

        $playhistory->update([
            'total'     => $request->input('total'),
            'played_at' => $request->input('played_at'),
        ]);

        \Session::flash('flash_message', '更新が完了しました');

        return redirect('/playhistory/'.$playhistory->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GamePlayHistory  $playhistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(GamePlayHistory $playhistory)
    {
        $playhistory->delete();

        \Session::flash('flash_message', '更新が完了しました');

        return redirect('/playhistory');
    }
}
