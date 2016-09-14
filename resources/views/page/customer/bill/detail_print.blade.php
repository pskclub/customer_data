<style>
    table {
        border-collapse: collapse;
    }

    td {
        font-size: 1.5em;
    }

    th {
        font-size: 1.5em;
    }


</style>

<table style="width:100%;">
    <tbody>
    <tr valign="top">
        <td valign="top">
            <img style="height: 70px" src="{{ asset('public/images/logo.png') }}" alt="">
        </td>
        <td align="center" valign="middle"
        >
            <table style="width:100%;">
                <tbody>
                <tr valign="top">
                    <td valign="top" style="background-color: black;color: white;padding: 5px">
                        <h2
                        >{{ $bill->TypeHead }}</h2>
                    </td>
                    <td align="center" valign="middle"
                    >

                    </td>
                </tr>
                </tbody>
            </table>


        </td>
    </tr>
    </tbody>
</table>


<div class="clearfix"></div>
<table border="0" cellpadding="1" cellspacing="1" style="width:100%;margin-top: 20px;margin-bottom: 20px">
    <tbody>
    <tr>
        <td width="60%" valign="top" valign="top">
            <table class="table table-bordered" style="    background-color: #F9FAFC;width: 100%">
                <tbody>
                @if($bill->type != 'quotation_bill')
                    <tr>
                        <th width="25%"
                            style="text-align: right;border: 1px solid black;height: 30px;padding-right: 5px">
                            เรื่อง
                        </th>
                        <td style="border: 1px solid black;padding-left: 5px">เสนอราคางานสิ่งพิมพ์</td>
                    </tr>
                    <tr>
                        <th width="25%"
                            style="text-align: right;border: 1px solid black;height: 30px;padding-right: 5px">
                            เรียน ATTN
                        </th>
                        <td style="border: 1px solid black;padding-left: 5px">{{ $bill->name }}</td>
                    </tr>
                @endif
                <tr>
                    <th width="25%" style="text-align: right;border: 1px solid black;height: 30px;padding-right: 5px">
                        ชื่อบริษัท
                    </th>
                    <td style="border: 1px solid black;padding-left: 5px">{{ $bill->company }}</td>
                </tr>
                <tr>
                    <th width="25%" style="text-align: right;border: 1px solid black;height: 30px;padding-right: 5px">
                        ที่อยู่
                    </th>
                    <td style="border: 1px solid black;padding-left: 5px">{{ $bill->address }}</td>
                </tr>


                </tbody>
            </table>
        </td>
        <td width="40%" valign="top">
            <table class="table table-bordered" style="padding-bottom: 0px;    background-color: #F9FAFC;width: 100%">
                <tbody>
                <tr>
                    <th width="30%" style="text-align: right;border: 1px solid black;height: 30px;padding-right: 5px">
                        วันที่
                    </th>
                    <td style="border: 1px solid black;padding-left: 5px">{{ $bill->date }}</td>
                </tr>
                <tr>
                    <th width="30%" style="text-align: right;border: 1px solid black;height: 30px;padding-right: 5px"
                    >เลขที่ No.
                    </th>
                    <td style="border: 1px solid black;padding-left: 5px">{{ $bill->id }}</td>
                </tr>
                @if(!$bill->type == 'quotation_bill')
                    <tr>
                        <th width="30%"
                            style="text-align: right;border: 1px solid black;height: 30px;padding-right: 5px"
                        >Tax No.
                        </th>
                        <td style="border: 1px solid black;padding-left: 5px">{{ $customer->taxpayers }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
            @if(!$bill->type == 'quotation_bill')
                <center><h2>www.print-togo.com</h2></center>
            @endif
        </td>
    </tr>
    </tbody>
</table>


@if($bill->type != 'quotation_bill')
    <h2 class="text-center" style="margin-top: 40px;margin-bottom: 40px;text-align: center">
        เรามีความยินดีขอเสนอราคาและเงื่อนไขแก่ท่านตามที่ระบุไว้ในใบเสนอราคานี้
        <br>
        We are please to quote you the following products and condition as described below
    </h2>
@endif
<div class="table-responsive">
    <table class="table table-bordered" style="width: 100%;border: 1px solid black;">
        <tbody>
        <tr>
            <th width="5%" style="border: 1px solid black;height: 30px" class="text-center">No.</th>
            <th width="50%" style="border: 1px solid black;" class="text-center">รายการ(Description)</th>
            <th width="15%" style="border: 1px solid black;" class="text-center">จำนวน(qty.)</th>
            <th width="15%" style="border: 1px solid black;" class="text-center">หน่วย(Unit Price)</th>
            <th width="15%" style="border: 1px solid black;" class="text-center">รวมเป็นเงิน</th>
        </tr>

        @foreach($bill->billLists as $list)
            <tr>
                <td style="border: 1px solid black;height: 30px" align="center">{{ $list->item }}</td>
                <td style="border: 1px solid black;padding-left: 10px">{{ $list->description }}</td>
                <td style="border: 1px solid black;" align="center">{{ number_format($list->qty) }}</td>
                <td style="border: 1px solid black;" align="center">{{ number_format($list->price,2) }}</td>
                <td style="border: 1px solid black;" align="center">{{ number_format($list->price *  $list->qty,2)}}</td>
            </tr>
        @endforeach
        @for($i=$bill->billLists->count();$i<6;$i++)
            <tr style="height: 35px">
                <td style="border: 1px solid black;height: 30px" align="center"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;" align="center"></td>
                <td style="border: 1px solid black;" align="center"></td>
                <td style="border: 1px solid black;" align="center"></td>
            </tr>
        @endfor
        @if($bill->type == 'quotation_bill')
            <tr>
                <td colspan="2" rowspan="3" style="border: 1px solid black;height: 30px">
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <th align="left">
                                <b>รวมเงิน อักษร(บาท) :</b>
                            </th>
                            <td align="center">
                                {{ $thaiGrandTotalNoVat }}
                            </td>
                        </tr>
                        </tbody>
                    </table>


                </td>
                <th colspan="2"
                    style="background-color: #F9FAFC;border: 1px solid black;height: 30px;padding-right: 10px"
                    align="right">
                    รวมทั้งสิ้น/Grand Total
                </th>
                <td style="background-color: #F9FAFC;border: 1px solid black;"
                    align="center">{{ number_format($total,2) }}</td>
                @endif

                @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash')
            </tr>
        @endif
        @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash' || $bill->type == 'quotation_list')
            <tr>
                <td colspan="2" rowspan="3" style="padding-right: 5px;padding-top: 10px;
                @if($bill->type == 'quotation_list')
                        padding-top:80px;

                @endif
                        ">
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <th align="left">
                                <b>รวมเงิน อักษร(บาท) :</b>
                            </th>
                            <td align="center">
                                @if($bill->type == 'quotation_vat')
                                    {{ $thaiGrandTotal }}
                                @else
                                    {{ $thaiGrandTotalNoVat }}
                                @endif
                            </td>
                        </tr>
                        <tr>

                            <td align="left" colspan="2" style="border: 1px solid black;padding: 5px">
                                <b>กำหนดส่งสินค้า / Delivery Time</b> {{ $bill->delivery }} วัน <br>
                                <b>กำหนดยื่นราคา / Quatation Valid for</b> {{ $bill->quotation }} วัน <br>
                                <b>หมายเหตุ :</b> เงื่อนไงการชำระเงิน / Term of Payment
                                เงินสดมัดจำ {{ $bill->condition }}
                            </td>
                        </tr>
                        </tbody>
                    </table>


                </td>
                @if($bill->type == 'quotation_list')
                    <td colspan="3" rowspan="3" style="padding-top: 10px;">
                        <table style="width:100%;">
                            <tbody>
                            <tr style="border: 1px solid black;">

                                <td style="min-height: 200px">
                                    <b>Note : </b><br>
                                    {{ nl2br($bill->note) }}


                                </td>

                            </tr>
                            </tbody>
                        </table>


                    </td>
                @endif
                @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash')
                    <th colspan="2" style="background-color: #F9FAFC;border: 1px solid black;padding-right: 5px"
                        align="right"><p
                                class="text-right">
                            รวมเป็นเงิน/Total</p></th>
                    <td style="background-color: #F9FAFC;border: 1px solid black;" align="center"><p
                                class="text-center">{{ number_format($total,2) }}</p></td>
            </tr>
            <tr style="background-color: #F9FAFC;">
                <th colspan="2" style="border: 1px solid black;padding-right: 5px" align="right">ภาษีมูลค่าเพิ่ม/Vat
                    7%
                </th>
                <td style="border: 1px solid black;" align="center">
                    @if($bill->type == 'quotation_vat')
                        {{ number_format($vat7,2) }}
                    @endif
                    @if($bill->type == 'quotation_cash')
                        -
                    @endif

                </td>
            </tr>
            <tr style="background-color: #F9FAFC;">
                <th colspan="2" align="right" style="border: 1px solid black;padding-right: 5px"><p class="text-right">
                        รวมทั้งสิ้น/Grand
                        Total</p></th>
                <td align="center" style="border: 1px solid black;"><p class="text-center">
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
    <table border="0" cellpadding="1" cellspacing="1" style="width:100%;">
        <tbody>
        <tr>
            <td width="60%">

            </td>
            <td width="40%">
                <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">
                <center><p class="text-center" algn="center" style="text-align: center;margin: auto">
                        บดินทร์ รู้แนบเนียน <br>
                        ผู้รับเงิน
                    </p></center>

            </td>
        </tr>
        </tbody>
    </table>


    <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">

    <table border="0" cellpadding="1" cellspacing="1" style="width:100%;">
        <tbody>
        <tr>
            <td width="40%" valign="top">
                <table class="table table-bordered"
                       style="    background-color: #F9FAFC;width: 100%;border: 1px solid black">
                    <tbody>
                    <tr>
                        <th width="65%" style="border: 1px solid black;height: 30px" align="right">รวมเป็นเงิน/Total
                        </th>
                        <td width="35%" style="border: 1px solid black" align="center"
                            class="text-center">{{ number_format($total,2) }}</td>
                    </tr>
                    <tr>
                        <th width="65%" style="border: 1px solid black;height: 30px" align="right">เงินมัดจำ/Deposit
                        </th>
                        <td width="35%" style="border: 1px solid black" align="center"
                            class="text-center">{{ number_format($bill->deposit) }}</td>
                    </tr>
                    <tr>
                        <th width="65%" style="border: 1px solid black;height: 30px" align="right">คงเหลือค้างจ่าย/Grand
                            Total
                        </th>
                        <td width="35%" style="border: 1px solid black" align="center"
                            class="text-center"> {{ number_format($total-$bill->deposit) }}</td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="60%" valign="top">
                <table class="table table-bordered" style="    background-color: #F9FAFC;width: 100%">
                    <tbody>
                    <tr>
                        <td width="50%" style="border: 1px solid black;height: 30px" align="center"><b>ชื่อผู้ติดต่อ
                                : </b>{{ $bill->name }}
                        </td>
                        <td width="50%" style="border: 1px solid black;height: 30px" align="center"><b>เบอร์โทร
                                : </b>{{ $customer->mobile }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border: 1px solid black;height: 30px"><b>Note : </b>{{ $bill->note }}
                        </td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>





@endif
@if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash' || $bill->type == 'quotation_list')
    <table style="width:100%;margin-top: 20px;
    @if($bill->type == 'quotation_list')
            margin-top: 100px;

    @endif
            ">
        <tbody>
        <tr valign="middle">
            <td width="50%" valign="top">
                <b>หมายเหตุ : </b><br>
                1. กรุณาตรวจสอบเอกสารให้เรียบร้อยก่อนสั่งพิมพ์ <br>
                2. ทางร้านจะไม่รับผิดชอบหากเกิดผิดพลาดหลังจากที่ลูกค้า<br>ตรวจสอบงานต้นฉบับและยืนยันสั่งผลิตแล้ว
                @if($bill->type == 'quotation_vat' || $bill->type == 'quotation_cash')

                    <table style="width:100%;margin-top: 10px">
                        <tbody>
                        <tr valign="top">
                            <td width="50%" valign="top" style="padding: 5px;border: 1px solid black;font-size: 1.5em">
                                <b>Note : </b><br>
                                {{ $bill->note }}
                            </td>

                        </tr>
                        </tbody>
                    </table>

                @endif

            </td>
            <td width="50%" align="center" valign="top">

                <table style="width:100%;">
                    <tbody>
                    <tr valign="middle">
                        <td width="50%" align="center" valign="top" style="padding: 5px">
                            <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
border: none;">
                            <p align="center">
                                บดินทร์ รู้แนบเนียน <br>

                                    ผู้เสนอราคา

                            </p>
                        </td>
                        <td width="50%" align="center" valign="top" style="padding: 5px"
                        >
                            <hr style="background-color: black;margin-top: 70px;height: 1px;
color: #123455;
background-color: black;
border: none;">
                            <p align="center">
                                ผู้รับการเสนอราคาลงนามอนุมัติสั่งงาน <br>
                                ผู้อนุมัติ
                            </p>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>




@endif
