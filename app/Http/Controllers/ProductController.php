<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\SearchRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
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

        $products = $query->paginate(10);

        // 編集画面から戻るときに使う
        session()->put('page_list_url', $request->fullUrl());

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 検索一覧への戻りurl
        $page_list_url = session()->get('page_list_url') ?? url('/product');

        return view('product.create', compact('page_list_url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            \DB::beginTransaction();

            $product = Product::create([
                'code'        => $request->input('code'),
                'name'        => $request->input('name'),
                'description' => $request->input('description'),
                'price'       => $request->input('price'),
                'stock'       => $request->input('stock'),
                'memo'        => $request->input('memo'),
            ]);

            if ($request->has('image')) {
                $images = $request->file('image');

                foreach ($images as $image) {
                    // ファイル名をユニークに
                    $filename = date('mdHis').uniqid('_').'.'.'jpg';

                    // 画像をresize
                    $content = Image::make($image)->resize($width = null, $height = 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    // ストレージはとりあえずpublic
                    $disk = \Storage::disk('public');
                    // 画像を保存
                    $disk->put($filename, $content->encode(), 'public');
                    // ブラウザから参照可能なURLを取得
                    $url = $disk->url($filename);

                    // DBに保存
                    ProductImage::create([
                        'product_id' => $product->id,
                        'url'        => $url,
                    ]);
                }
            }

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        \Session::flash('flash_message', '登録が完了しました');

        return redirect('/product/'.$product->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // 検索一覧への戻りurl
        $page_list_url = session()->get('page_list_url') ?? url('/product');

        return view('product.edit', compact('product', 'page_list_url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Product $product)
    {
        try {
            \DB::beginTransaction();

            $product->update([
                'code'        => $request->input('code'),
                'name'        => $request->input('name'),
                'description' => $request->input('description'),
                'price'       => $request->input('price'),
                'stock'       => $request->input('stock'),
                'memo'        => $request->input('memo'),
            ]);

            if ($request->has('image')) {
                $images = $request->file('image');

                foreach ($images as $image) {
                    // 元の画像を全削除
                    $product->images()->each(function ($image) { 
                        $image->delete();
                    });

                    // ファイル名をユニークに
                    $filename = date('mdHis').uniqid('_').'.'.'jpg';

                    // 画像をresize
                    $content = Image::make($image)->resize($width = null, $height = 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    // ストレージはとりあえずpublic
                    $disk = \Storage::disk('public');
                    // 画像を保存
                    $disk->put($filename, $content->encode(), 'public');
                    // ブラウザから参照可能なURLを取得
                    $url = $disk->url($filename);

                    // DBに保存
                    ProductImage::create([
                        'product_id' => $product->id,
                        'url'        => $url,
                    ]);
                }
            }

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        \Session::flash('flash_message', '更新が完了しました');

        return redirect('/product/'.$product->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            \DB::beginTransaction();

            $product->delete();

            // TODO 画像ファイルも消す
            $product->images->each(function ($image) {
                $image->delete();
            });

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        \Session::flash('flash_message', '削除が完了しました');

        return redirect('/product');
    }
}
