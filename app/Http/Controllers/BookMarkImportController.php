<?php

namespace App\Http\Controllers;

use App\Model\BookMark;
use Illuminate\Http\Request;
use IvoPetkov\HTML5DOMDocument;

class BookMarkImportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmark.import.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $htmlfile = $request->file('htmlfile');

        $mimeType = $htmlfile->getMimeType();
        if (0 !== strpos($mimeType, 'text/html')) {
            return redirect()->back()->withInput()->withErrors(['htmlfile' => 'ファイル形式が不正です']);
        }

        $validator = \Validator::make($request->all(), [
            'htmlfile' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $disk = \Storage::disk('local');

        $filename = date('mdHis').'.html';
        $htmlfile->storeAs('bookmark', $filename);

        $content = $disk->get('bookmark/'.$filename);

        $dom = new HTML5DOMDocument();
        $dom->loadHTML($content);

        foreach($dom->getElementsByTagName('a') as $a){

            if ($a->innerHTML === '') continue;

            if ($this->isNoise($a->innerHTML)) continue;

            BookMark::create([
                'title' => $a->innerHTML,
                'url'   => $a->getAttribute('href'),
            ]);
        }

        \Session::flash('flash_message', '登録が完了しました');

        return redirect('/bookmark');
    }

    private function isNoise($title)
    {
        $skip_list = [
            '最近ブックマークしたページ',
            '最近付けたタグ',
            'ヘルプとチュートリアル',
            'Firefox をカスタマイズしてみよう',
            'Mozilla のコミュニティ',
            'Mozilla について',
        ];

        return in_array($title, $skip_list, true);
    }
}
