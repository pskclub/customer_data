<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\models\Bill;
use App\models\BillList;
use App\models\Customer;
use Illuminate\Http\Request;
use mPDF;

class CustomerBillController extends Controller
{
    public function printf()
    {
        $customer = Customer::findOrFail(4);
        $bill = $customer->bills()->findOrFail(5);
        $mpdf = new mPDF('', 'A4', 9, 'sarabun');

        $html = view('page.customer.bill.detail_print', compact('customer', 'bill'))->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
//        return view('page.customer.bill.detail_print', compact('customer', 'bill'));
    }

    public function del($customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $customer->bills()->findOrFail($bill_id)->deleteAll();
        return redirect()->back();
    }

    public function store($customer_id, Request $request)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = new Bill();
        $bill = $bill->fill($request->all());
        $customer->bills()->save($bill);
        foreach ($request->item as $key => $n) {
            if (!$request->item[$key] == '') {
                $billList = new BillList();
                $billList->item = $request->item[$key];
                $billList->description = $request->description[$key];
                $billList->qty = $request->qty[$key];
                $billList->price = $request->price[$key];
                $bill->billLists()->save($billList);
            }
        }

        return redirect('dashboard/customer/' . $customer_id . '/bills/' . $bill->id);

    }

    public function addQuotationVat($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('page.customer.bill.quotation_vat_add', compact('customer'));
    }

    public function getQuotationVat($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bills = $customer->bills()->where('type', 'quotation_vat')->paginate(30);
        $type = 'ใบเสนอราคา VAT';
        return view('page.customer.bill.index', compact('customer', 'bills', 'type'));
    }

    public function addQuotationCash($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('page.customer.bill.quotation_cash_add', compact('customer'));
    }

    public function getQuotationCash($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bills = $customer->bills()->where('type', 'quotation_cash')->paginate(30);
        $type = 'ใบเสนอราคา CASH';
        return view('page.customer.bill.index', compact('customer', 'bills', 'type'));
    }

    public function addQuotationList($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('page.customer.bill.quotation_list_add', compact('customer'));
    }

    public function getQuotationList($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bills = $customer->bills()->where('type', 'quotation_list')->paginate(30);
        $type = 'ใบเสนอราคา LIST';
        return view('page.customer.bill.index', compact('customer', 'bills', 'type'));
    }

    public function addQuotationBill($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('page.customer.bill.quotation_bill_add', compact('customer'));
    }

    public function getQuotationBill($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bills = $customer->bills()->where('type', 'quotation_bill')->paginate(30);
        $type = 'ใบเสร็จรับเงิน';
        return view('page.customer.bill.index', compact('customer', 'bills', 'type'));
    }

    public function getId(Request $request, $customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = $customer->bills()->findOrFail($bill_id);
        return view('page.customer.bill.detail', compact('customer', 'bill'));
    }
}
