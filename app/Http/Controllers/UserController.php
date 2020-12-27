<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\SearchRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $query = User::query();

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

        $users = $query->paginate(10);

        // 編集画面から戻るときに使う
        session()->put('page_list_url', $request->fullUrl());

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 検索一覧への戻りurl
        $page_list_url = session()->get('page_list_url') ?? url('/user');

        return view('user.create', compact('page_list_url'));
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

            $user = User::create([
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

        return redirect('/user/'.$user->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // 検索一覧への戻りurl
        $page_list_url = session()->get('page_list_url') ?? url('/user');

        return view('user.edit', compact('user', 'page_list_url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            \DB::beginTransaction();

            $user->update([
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

        return redirect('/user/'.$user->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        \Session::flash('flash_message', '削除が完了しました');

        return redirect('/user');
    }
}
