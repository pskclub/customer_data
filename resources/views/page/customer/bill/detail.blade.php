@extends('_layouts.master_layout')

@push('css')
<style>

    body {
        -webkit-print-color-adjust: exact;
    }


</style>
@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                {{ $bill->TypeTran }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li><a href="{{ url('dashboard') }}">Customer</a></li>
                <li><a href="{{ url('dashboard/customer/'. $customer->id ) }}">{{ $customer->company }}</a></li>
                <li>
                    <a href="{{ url('dashboard/customer/'. $customer->id.'/'.$bill->type ) }}">รายการ{{ $bill->TypeTran }}</a>
                </li>
                <li class="active">{{ $bill->TypeTran }}</li>
            </ol>
        </section>
        <section class="content">
            <div class="container" style="margin-top: 50px">
                <div class="pull-left"><img style="height: 70px" src="{{ asset('public/images/logo.png') }}" alt="">
                </div>
                <div class="pull-right"><h2
                            style="background-color: black;color: white;padding: 10px;padding-left: 30px;padding-right: 30px">{{ $bill->TypeHead }}</h2>
                </div>
                <div class="clearfix"></div>
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-7">

                        <table class="table table-bordered" style="    background-color: #d2d6de;">
                            <tbody>
                            <tr>
                                <th width="25%" style="text-align: right">เรื่อง</th>
                                <td>เสนอราคางานสิ่งพิมพ์</td>
                            </tr>
                            <tr>
                                <th width="25%" style="text-align: right">เรียน ATTN</th>
                                <td>{{ $bill->name }}</td>
                            </tr>
                            <tr>
                                <th width="25%" style="text-align: right">ชื่อบริษัท</th>
                                <td>{{ $bill->company }}</td>
                            </tr>
                            <tr>
                                <th width="25%" style="text-align: right">ที่อยู่</th>
                                <td>{{ $bill->address }}</td>
                            </tr>


                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-5">
                        <table class="table table-bordered" style="padding-bottom: 0px;    background-color: #d2d6de;">
                            <tbody>
                            <tr>
                                <th width="30%" style="text-align: right">วันที่</th>
                                <td>{{ $bill->date }}</td>
                            </tr>
                            <tr>
                                <th width="30%" style="text-align: right">เลขที่ No.</th>
                                <td>{{ $bill->id }}</td>
                            </tr>
                            <tr>
                                <th width="30%" style="text-align: right">Tax No.</th>
                                <td>{{ $customer->taxpayers }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <h3 class="text-center" style="margin-top: 0px">www.print-togo.com</h3>
                    </div>
                </div>
                @if($bill->type != 'quotation_bill')
                    <h4 class="text-center" style="margin-top: 40px;margin-bottom: 40px">
                        เรามีความยินดีขอเสนอราคาและเงื่อนไขแก่ท่านตามที่ระบุไว้ในใบเสนอราคานี้
                        <br>
                        <br>
                        We are please to quote you the following products and condition as described below
                    </h4>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr style="background-color: black;color: white">
                            <th width="5%" class="text-center">No.</th>
                            <th width="50%" class="text-center">รายการ(Description)</th>
                            <th width="15%" class="text-center">จำนวน(qty.)</th>
                            <th width="15%" class="text-center">หน่วย(Unit Price)</th>
                            <th width="15%" class="text-center">รวมเป็นเงิน</th>
                        </tr>

                        @foreach($bill->billLists as $list)
                            <tr>
                                <td class="text-center">{{ $list->item }}</td>
                                <td>{{ $list->description }}</td>
                                <td class="text-center">{{ number_format($list->qty) }}</td>
                                <td class="text-center">{{ number_format($list->price) }}</td>
                                <td class="text-center">{{ number_format($list->price *  $list->qty)}}</td>
                            </tr>
                        @endforeach
                        @for($i=$bill->billLists->count();$i<6;$i++)
                            <tr style="height: 35px">
                                <td class="text-center"></td>
                                <td></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                            </tr>
                        @endfor
                        @if($bill->type == 'quotation_bill')
                            <tr>
                                <td colspan="2" rowspan="3">
                                    <p class="pull-left"><b>รวมเงิน อักษร(บาท) :</b></p>
                                    <p style="width: 100%" class="text-center">{{ $thaiGrandTotalNoVat }}</p>

                                </td>
                                <td colspan="2" style="background-color: #d2d6de;"><p class="text-right">
                                        รวมทั้งสิ้น/Grand Total</p></td>
                                <td style="background-color: #d2d6de;"><p
                                            class="text-center">{{ number_format($total,2) }}</p></td>
                                @endif
                                @if($bill->type == 'quotation_list')
                                    {{-- <td colspan="3" rowspan="3">
                                         <div style="border-style: solid;border-width:1px ;padding: 10px;height: 110px;">
                                             <b>Note : </b><br>
                                             {{ $bill->note }}
                                         </div>
                                     </td>--}}
                                @endif
                                @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash')
                                    {{--  <td colspan="2"><p class="text-right">รวมเป็นเงิน/Total</p></td>
                                      <td><p class="text-center">{{ number_format($total,2) }}</p></td>--}}
                            </tr>
                        @endif
                        @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash' || $bill->type == 'quotation_list')
                            <tr>
                                <td colspan="2" rowspan="3">
                                    <p class="pull-left"><b>รวมเงิน อักษร(บาท) :</b></p>
                                    <p style="width: 100%;" class="text-center">
                                        @if($bill->type == 'quotation_vat')
                                            {{ $thaiGrandTotal }}
                                        @else
                                            {{ $thaiGrandTotalNoVat }}
                                        @endif
                                    </p>
                                    <p>
                                        <b>กำหนดส่งสินค้า / Delivery Time</b> {{ $bill->delivery }} วัน <br>
                                        <b>กำหนดยื่นราคา / Quatation Valid for</b> {{ $bill->quotation }} วัน <br>
                                        <b>หมายเหตุ :</b> เงื่อนไงการชำระเงิน / Term of Payment
                                        เงินสดมัดจำ {{ $bill->condition }}
                                    </p>
                                </td>
                                @if($bill->type == 'quotation_list')
                                    <td colspan="3" rowspan="3">
                                        <div style="border-style: solid;border-width:1px ;padding: 10px;height: 110px;">
                                            <b>Note : </b><br>
                                            {{ $bill->note }}
                                        </div>
                                    </td>
                                @endif
                                @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash')
                                    <td colspan="2" style="background-color: #d2d6de;"><p class="text-right">
                                            รวมเป็นเงิน/Total</p></td>
                                    <td style="background-color: #d2d6de;"><p
                                                class="text-center">{{ number_format($total,2) }}</p></td>
                            </tr>
                            <tr style="background-color: #d2d6de;">
                                <td colspan="2"><p class="text-right">ภาษีมูลค่าเพิ่ม/Vat 7%</p></td>
                                <td><p class="text-center">
                                        @if($bill->type == 'quotation_vat')
                                            {{ number_format($vat7,2) }}
                                        @endif
                                        @if($bill->type == 'quotation_cash')
                                            -
                                        @endif

                                    </p></td>
                            </tr>
                            <tr style="background-color: #d2d6de;">
                                <td colspan="2"><p class="text-right">รวมทั้งสิ้น/Grand Total</p></td>
                                <td><p class="text-center">
                                        @if($bill->type == 'quotation_vat')
                                            {{ number_format($grandTotal,2) }}
                                        @endif
                                        @if($bill->type == 'quotation_cash')
                                            {{ number_format($grandTotalNoVat,2) }}
                                        @endif

                                    </p></td>
                            </tr>
                        @endif
                        @endif
                        </tbody>
                    </table>
                </div>
                @if($bill->type == 'quotation_bill')
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4">
                            <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">
                            <p class="text-center">
                                บดินทร์ รู้แนบเนียน <br>
                                ผู้เสนอราคา
                            </p>
                        </div>

                    </div>

                    <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="    background-color: #d2d6de;">
                                    <tbody>
                                    <tr>
                                        <th width="60%" class="text-right">รวมเป็นเงิน/Total</th>
                                        <td width="50%" class="text-center">{{ number_format($total,2) }}</td>
                                    </tr>
                                    <tr>
                                        <th width="60%" class="text-right">เงินมัดจำ/Deposit</th>
                                        <td width="50%" class="text-center">{{ number_format($bill->deposit) }}</td>
                                    </tr>
                                    <tr>
                                        <th width="60%" class="text-right">คงเหลือค้างจ่าย/Grand Total</th>
                                        <td width="50%"
                                            class="text-center"> {{ number_format($total-$bill->deposit) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="    background-color: #d2d6de;">
                                    <tbody>
                                    <tr>
                                        <td width="50%" class="text-center"><b>ชื่อผู้ติดต่อ : </b>{{ $bill->name }}
                                        </td>
                                        <td width="50%" class="text-center"><b>เบอร์โทร : </b>{{ $customer->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Note : </b>{{ $bill->note }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash' || $bill->type == 'quotation_list')
                    <div class="row">
                        <div class="col-md-6">

                            <b>หมายเหตุ : </b><br>
                            1. กรุณาตรวจสอบเอกสารให้เรียบร้อยก่อนสั่งพิมพ์ <br>
                            2. ทางร้านจะไม่รับผิดชอบหากเกิดผิดพลาดหลังจากที่ลูกค้าตรวจสอบงานต้นฉบับและยืนยันสั่งผลิตแล้ว
                            @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash')
                                <div style="border-style: solid;border-width:1px ;padding: 10px;margin-top: 10px">
                                    <b>Note : </b><br>
                                    {{ $bill->note }}
                                </div>
                            @endif

                        </div>
                        <div class="col-md-6" style="padding: 15px">
                            <div class="row" style="padding: 0px">
                                <div class="col-md-6" style="padding-left: 0px">
                                    <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">
                                    <p class="text-center">
                                        บดินทร์ รู้แนบเนียน <br>
                                        ผู้เสนอราคา
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">
                                    <p class="text-center">
                                        ผู้รับการเสนอราคาลงนามอนุมัติสั่งงาน <br>
                                        ผู้อนุมัติ
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
            <div class="row" style="margin-top: 50px">
                <div class="col-md-offset-5 col-md-2">
                    <a target="_blank" href="{{ url('dashboard/customer/'.$customer->id.'/bill/'.$bill->id.'/print') }}"
                       class="btn btn-danger btn-block">พิมพ์ใบเสนอราคา</a>
                </div>
            </div>
        </section>

    </div>
@endsection


@push('scripts')


@endpush
