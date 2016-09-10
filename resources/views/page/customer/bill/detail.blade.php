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
            <div class="pull-left"><img style="height: 70px" src="{{ asset('public/images/logo.png') }}" alt=""></div>
            <div class="pull-right"><h2
                        style="background-color: black;color: white;padding: 10px;padding-left: 30px;padding-right: 30px">{{ $bill->TypeHead }}</h2>
            </div>
            <div class="clearfix"></div>
            <div class="row" style="margin-top: 50px">
                <div class="col-xs-7">

                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td width="25%" style="text-align: right">เรื่อง</td>
                            <td>เสนอราคางานสิ่งพิมพ์</td>
                        </tr>
                        <tr>
                            <td width="25%" style="text-align: right">เรียน ATTN</td>
                            <td>{{ $bill->name }}</td>
                        </tr>
                        <tr>
                            <td width="25%" style="text-align: right">ชื่อบริษัท</td>
                            <td>{{ $bill->company }}</td>
                        </tr>
                        <tr>
                            <td width="25%" style="text-align: right">ที่อยู่</td>
                            <td>{{ $bill->address }}</td>
                        </tr>


                        </tbody>
                    </table>

                </div>

                <div class="col-xs-5">
                    <table class="table table-bordered" style="padding-bottom: 0px">
                        <tbody>
                        <tr>
                            <td width="30%" style="text-align: right">วันที่</td>
                            <td>{{ $bill->date }}</td>
                        </tr>
                        <tr>
                            <td width="30%" style="text-align: right">เลขที่ No.</td>
                            <td>{{ $bill->id }}</td>
                        </tr>
                        <tr>
                            <td width="30%" style="text-align: right">Tax No.</td>
                            <td>{{ $customer->taxpayers }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <h3 class="text-center" style="margin-top: 0px">www.print-togo.com</h3>
                </div>
            </div>
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


                    <tr>
                        <td><p class="text-center">1</p></td>
                        <td><p>fsdzfsdfdsf</p></td>
                        <td><p class="text-center">454</p></td>
                        <td><p class="text-center">54354</p></td>
                        <td><p class="text-center">544</p></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="3">
                            <p class="pull-left"><b>รวมเงิน อักษร(บาท) :</b></p>
                            <p style="width: 100%" class="text-center">ห้าพันบาท</p>
                            <p>
                                <b>กำหนดส่งสินค้า / Delivery Time</b> {{ $bill->delivery }} วัน <br>
                                <b>กำหนดยื่นราคา / Quatation Valid for</b> {{ $bill->quotation }} วัน <br>
                                <b>หมายเหตุ :</b> เงื่อนไงการชำระเงิน / Term of Payment
                                เงินสดมัดจำ {{ $bill->condition }}
                            </p>
                        </td>
                        <td colspan="2"><p class="text-right">รวมเป็นเงิน</p></td>
                        <td><p class="text-center">544</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p class="text-right">รวมเป็นเงิน</p></td>
                        <td><p class="text-center">544</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p class="text-right">รวมเป็นเงิน</p></td>
                        <td><p class="text-center">544</p></td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-xs-6">

                    <b>หมายเหตุ : </b><br>
                    1. กรุณาตรวจสอบเอกสารให้เรียบร้อยก่อนสั่งพิมพ์ <br>
                    2. ทางร้านจะไม่รับผิดชอบหากเกิดผิดพลาดหลังจากที่ลูกค้าตรวจสอบงานต้นฉบับและยืนยันสั่งผลิตแล้ว


                </div>
                <div class="col-xs-6" style="padding: 0px">
                    <div class="row" style="padding: 0px">
                        <div class="col-xs-6" style="padding-left: 0px">
                            <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">
                            <p class="text-center">
                                บดินทร์ รู้แนบเนียน <br>
                                ผู้เสนอราคา
                            </p>
                        </div>
                        <div class="col-xs-6">
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
        </section>

    </div>
@endsection


@push('scripts')
<script>
    $(document).ready(function () {
        $('form')
                .on('click', '.addButton', function () {
                    var $template = '<input name="images_more[]" type="file" class="form-control" accept="image/*" placeholder="ภาพประกอบ">';
                    $('#img').append($template)

                })

    });
</script>

@endpush
