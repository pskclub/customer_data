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
    public function printPDF($customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = $customer->bills()->findOrFail($bill_id);
        $total = 0;
        $vat7 = 0;
        $grandTotal = 0;

        foreach ($bill->billLists as $list) {
            $total = $total + ($list->price * $list->qty);
        }
        $vat7 = $total * 7 / 100;
        $grandTotal = $vat7 + $total;
        $grandTotalNoVat = $total;
        $thaiGrandTotal = $this->convert($total + $vat7);
        $thaiGrandTotalNoVat = $this->convert($total);

        $mpdf = new mPDF('', 'A4', 9, 'sarabun');

        $mpdf->SetTitle('ใบเสนอราคา ' . $bill->topic);
        $mpdf->SetSubject('ใบเสนอราคา ' . $bill->topic);
        $mpdf->SetCreator('ใบเสนอราคา ' . $bill->topic);
        $mpdf->SetAuthor('ใบเสนอราคา ' . $bill->topic);
        $mpdf->SetKeywords('ใบเสนอราคา ' . $bill->topic);
        $html = view('page.customer.bill.detail_print', compact('customer', 'bill', 'total', 'vat7', 'grandTotal',
            'grandTotalNoVat', 'thaiGrandTotal', 'thaiGrandTotalNoVat'))->render();
        $mpdf->WriteHTML($html);
        return $mpdf->Output('ใบเสนอราคา ' . $bill->topic . '.pdf', 'I');
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

    public function update($customer_id, $bill_id, Request $request)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = $customer->bills()->findOrFail($bill_id);
        $bill = $bill->fill($request->all());
        $bill->billLists()->delete();
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

    public function editQuotationVat($customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = Bill::findOrFail($bill_id);
        return view('page.customer.bill.quotation_vat_edit', compact('customer', 'bill'));
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

    public function editQuotationCash($customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = Bill::findOrFail($bill_id);
        return view('page.customer.bill.quotation_cash_edit', compact('customer', 'bill'));
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

    public function editQuotationList($customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = Bill::findOrFail($bill_id);
        return view('page.customer.bill.quotation_list_edit', compact('customer', 'bill'));
    }

    public function getQuotationList($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bills = $customer->bills()->where('type', 'quotation_list')->paginate(30);
        $type = 'ใบเสนอราคา LIST';
        return view('page.customer.bill.index', compact('customer', 'bills', 'type'));
    }

//------------------------------------
    public function addQuotationBill($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('page.customer.bill.quotation_bill_add', compact('customer'));
    }

    public function editQuotationBill($customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = Bill::findOrFail($bill_id);
        return view('page.customer.bill.quotation_bill_edit', compact('customer', 'bill'));
    }

    public function getQuotationBill($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bills = $customer->bills()->where('type', 'quotation_bill')->paginate(30);
        $type = 'ใบเสร็จรับเงิน';
        return view('page.customer.bill.index', compact('customer', 'bills', 'type'));
    }

    public function getId($customer_id, $bill_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $bill = $customer->bills()->findOrFail($bill_id);
        $total = 0;
        $vat7 = 0;
        $grandTotal = 0;

        foreach ($bill->billLists as $list) {
            $total = $total + ($list->price * $list->qty);
        }
        $vat7 = $total * 7 / 100;
        $grandTotal = $vat7 + $total;
        $grandTotalNoVat = $total;
        $thaiGrandTotal = $this->convert($total + $vat7);
        $thaiGrandTotalNoVat = $this->convert($total);
        return view('page.customer.bill.detail', compact('customer', 'bill', 'total', 'vat7', 'grandTotal',
            'grandTotalNoVat', 'thaiGrandTotal', 'thaiGrandTotalNoVat'));
    }


    private function convert($amount_number)
    {
        $amount_number = number_format($amount_number, 2, ".", "");
        $pt = strpos($amount_number, ".");
        $number = $fraction = "";
        if ($pt === false)
            $number = $amount_number;
        else {
            $number = substr($amount_number, 0, $pt);
            $fraction = substr($amount_number, $pt + 1);
        }

        $ret = "";
        $baht = $this->ReadNumber($number);
        if ($baht != "")
            $ret .= $baht . "บาท";

        $satang = $this->ReadNumber($fraction);
        if ($satang != "")
            $ret .= $satang . "สตางค์";
        else
            $ret .= "ถ้วน";
        return $ret;
    }

    private function ReadNumber($number)
    {
        $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
        $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
        $number = $number + 0;
        $ret = "";
        if ($number == 0) return $ret;
        if ($number > 1000000) {
            $ret .= $this->ReadNumber(intval($number / 1000000)) . "ล้าน";
            $number = intval(fmod($number, 1000000));
        }

        $divider = 100000;
        $pos = 0;
        while ($number > 0) {
            $d = intval($number / $divider);
            $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
                ((($divider == 10) && ($d == 1)) ? "" :
                    ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
            $ret .= ($d ? $position_call[$pos] : "");
            $number = $number % $divider;
            $divider = $divider / 10;
            $pos++;
        }
        return $ret;
    }
}
