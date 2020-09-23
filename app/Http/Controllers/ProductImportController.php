<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Statement;

class ProductImportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.import.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('csv');

        $mimeType = $file->getMimeType();
        if (0 !== strpos($mimeType, 'text/csv')) {
            //return redirect()->back()->withInput()->withErrors(['csv' => 'ファイル形式が不正です']);
        }

        $validator = \Validator::make($request->all(), [
            'csv' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $disk = \Storage::disk('local');

        $filename = date('mdHis').'.csv';
        $file->storeAs('product', $filename);

        $content = $disk->get('product/'.$filename);

        $csv = Reader::createFromPath(storage_path('app/').'product/'.$filename, 'r');
        //$csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(1);

        $records = $stmt->process($csv);
        foreach ($records as $record) {
            $record = [
                'code'        => $record[0],
                'name'        => $record[1],
                'description' => $record[2],
                'price'       => $record[3],
                'stock'       => $record[4],
                'memo'        => substr($record[5], 0, 255),
            ];

            $validator = \Validator::make($record, [
                'code'        => 'required|max:255',
                'name'        => 'required|max:255',
                'description' => 'required',
                'price'       => 'required',
                'stock'       => 'integer',
                'memo'        => 'max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            Product::create($record);
        }

        \Session::flash('flash_message', '登録が完了しました');

        return redirect('/product');
    }
}
