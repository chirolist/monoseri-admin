<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\SearchRequest;
use League\Csv\Writer;

class CustomerCsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download(SearchRequest $request)
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

        $customers = $query->get();

        $csv = Writer::createFromFileObject(new \SplTempFileObject);

        $csv->insertOne(array_keys($customers[0]->getAttributes()));

        foreach ($customers as $customer) {
            $csv->insertOne($customer->toArray());
        }

        $filename = 'customers_'.date('YmdHis').'.csv';

        return response($csv->getContent(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Transfer-Encoding' => 'binary',
            'Content-Disposition' => 'attachment; filename='.$filename,
        ]);
    }
}
