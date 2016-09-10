<table style="width: 100%">
    <tr>
        <td width="75%"><img style="height: 70px" src="{{ asset('public/images/logo.png') }}" alt=""></td>
        <td width="25%" style="text-align: right"><h2
                    style="background-color: black;color: white;padding-left: 30px;padding-right: 30px;padding-top: 20px;padding-bottom: 20px;text-align: center">{{ $bill->TypeHead }}</h2>
        </td>

    </tr>
</table>


<table style="width: 100%; border-style: solid;
    border-color: #ff0000 #0000ff;">
    <tr>
        <td width="50%">
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
        </td>
        <td width="50%">

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
            <h3 class="text-center" style="margin-top: 0px">www.print-togo.com</h3></td>

    </tr>
</table>


<table>
    <tbody>
    <tr>
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

