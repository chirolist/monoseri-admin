<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\SearchRequest;
use League\Csv\Writer;

class ProductCsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download(SearchRequest $request)
    {
        $query = Product::query();

        if ($request->input('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->input('code')) {
            $query->where('code', 'like', '%'.$request->input('code').'%');
        }

        if ($request->input('description')) {
            $query->where('description', 'like', '%'.$request->input('description').'%');
        }

        if ($request->input('memo')) {
            $query->where('memo', 'like', '%'.$request->input('memo').'%');
        }

        if (!is_null($request->input('price_from'))) {
            $query->where('price', '>=', $request->input('price_from'));
        }

        if (!is_null($request->input('price_to'))) {
            $query->where('price', '<=', $request->input('price_to'));
        }

        if (!is_null($request->input('stock_from'))) {
            $query->where('stock', '>=', $request->input('stock_from'));
        }

        if (!is_null($request->input('stock_to'))) {
            $query->where('stock', '<=', $request->input('stock_to'));
        }

        $query->orderBy('created_at', 'desc');

        $products = $query->get();

        $csv = Writer::createFromFileObject(new \SplTempFileObject);

        $csv->insertOne(array_keys($products[0]->getAttributes()));

        foreach ($products as $product) {
            $csv->insertOne($product->toArray());
        }

        return response($csv->getContent(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Transfer-Encoding' => 'binary',
            'Content-Disposition' => 'attachment; filename="products.csv"',
        ]);
    }
}
