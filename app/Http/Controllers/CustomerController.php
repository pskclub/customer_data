<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function add()
    {
        return view('page.customer.add');
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $customer->save;
    }
}
