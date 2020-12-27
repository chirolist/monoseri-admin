<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\SearchRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $query = Customer::query();

        if ($request->input('code')) {
            $query->where('code', 'like', '%'.$request->input('code').'%');
        }

        if ($request->input('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->input('kana')) {
            $query->where('kana', 'like', '%'.$request->input('kana').'%');
        }

        if ($request->input('postcode')) {
            $query->where('postcode', 'like', '%'.$request->input('postcode').'%');
        }

        if ($request->input('prefecture')) {
            $query->where('prefecture', 'like', '%'.$request->input('prefecture').'%');
        }

        if ($request->input('city')) {
            $query->where('city', 'like', '%'.$request->input('city').'%');
        }

        if ($request->input('address1')) {
            $query->where('address1', 'like', '%'.$request->input('address1').'%');
        }

        if ($request->input('address2')) {
            $query->where('address2', 'like', '%'.$request->input('address2').'%');
        }

        if ($request->input('tel')) {
            $query->where('tel', 'like', '%'.$request->input('tel').'%');
        }

        if ($request->input('email')) {
            $query->where('email', 'like', '%'.$request->input('email').'%');
        }

        if ($request->input('birthday')) {
            $query->where('birthday', '=', $request->input('birthday'));
        }

        if ($request->input('sex')) {
            $query->where('sex', '=', $request->input('sex'));
        }

        $query->orderBy('created_at', 'desc');

        $customers = $query->paginate(10);

        // 編集画面から戻るときに使う
        session()->put('page_list_url', $request->fullUrl());

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 検索一覧への戻りurl
        $page_list_url = session()->get('page_list_url') ?? url('/customer');

        return view('customer.create', compact('page_list_url'));
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

            $customer = Customer::create([
                'code'       => $request->input('code'),
                'name'       => $request->input('name'),
                'kana'       => $request->input('kana'),
                'postcode'   => $request->input('postcode'),
                'prefecture' => $request->input('prefecture'),
                'city'       => $request->input('city'),
                'address1'   => $request->input('address1'),
                'address2'   => $request->input('address2'),
                'tel'        => $request->input('tel'),
                'email'      => $request->input('email'),
                'birthday'   => $request->input('birthday'),
                'sex'        => $request->input('sex'),
            ]);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        \Session::flash('flash_message', '登録が完了しました');

        return redirect('/customer/'.$customer->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        // 検索一覧への戻りurl
        $page_list_url = session()->get('page_list_url') ?? url('/customer');

        return view('customer.edit', compact('customer', 'page_list_url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            \DB::beginTransaction();

            $customer->update([
                'code'       => $request->input('code'),
                'name'       => $request->input('name'),
                'kana'       => $request->input('kana'),
                'postcode'   => $request->input('postcode'),
                'prefecture' => $request->input('prefecture'),
                'city'       => $request->input('city'),
                'address1'   => $request->input('address1'),
                'address2'   => $request->input('address2'),
                'tel'        => $request->input('tel'),
                'email'      => $request->input('email'),
                'birthday'   => $request->input('birthday'),
                'sex'        => $request->input('sex'),
            ]);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        \Session::flash('flash_message', '更新が完了しました');

        return redirect('/customer/'.$customer->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        \Session::flash('flash_message', '削除が完了しました');

        return redirect('/customer');
    }
}
