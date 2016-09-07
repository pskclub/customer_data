<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\models\Bill;
use App\models\Customer;
use Illuminate\Http\Request;

class CustomerBillController extends Controller
{
    public function store($customer_id, Request $request)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = new Bill();
        $bill = $bill->fill($request->all());
        $customer->bill()->save($bill);

    }

    public function quotationVat($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('page.customer.quotation_vat', compact('customer'));
    }
}
