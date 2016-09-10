@extends('_layouts.master_layout')

@push('css')

@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                ขอใบเสนอราคา VAT
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li><a href="{{ url('dashboard') }}">Customer</a></li>
                <li><a href="{{ url('dashboard/customer/'.$customer->id) }}">{{ $customer->company }}</a></li>
                <li class="active">ขอใบเสนอราคา VAT</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ url('dashboard/customer/'.$customer->id.'/bill/add') }}">
                        {{ csrf_field() }}
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="form-group">
                                            <label>เรื่อง</label>
                                            <input type="hidden" name="type" value="quotation_vat">
                                            <input type="text" name="topic"
                                                   class="form-control" placeholder="ชื่อเรื่อง">
                                        </div>
                                        <div class="form-group">
                                            <label>ชื่อบริษัท</label>
                                            <input type="hidden" name="type" value="quotation_vat">
                                            <input type="text" name="company" value="{{$customer->company}}"
                                                   class="form-control" placeholder="ชื่อบริษัท">
                                        </div>
                                        <div class="form-group">
                                            <label>เรียน ATTN</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$customer->name}}"
                                                   placeholder="เรียน ATTN">
                                        </div>
                                        <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea name="address" class="form-control" style="max-width: 100%"
                                                      placeholder="ที่อยู่">{{$customer->address}}</textarea>
                                        </div>


                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">วันที่</label>
                                            <input type="text" name="date" value="{{ \Carbon\Carbon::now() }}"
                                                   class="form-control"
                                                   placeholder="วันที่">
                                        </div>
                                        <div class="form-group">
                                            <label>ผู้เสนอราคา</label>
                                            <input type="text" class="form-control" name="bidder"
                                                   placeholder="ผู้เสนอราคา">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr style="background-color: black;color: white">
                                            <th width="5%" class="text-center">ลำดับ(item)</th>
                                            <th width="20%" class="text-center">รายการ(Description)</th>
                                            <th width="20%" class="text-center">จำนวน(qty.)</th>
                                            <th width="15%" class="text-center">หน่วย(Unit Price)</th>
                                        </tr>


                                        <tr>
                                            <td><input name="item[]" type="number" class="form-control"></td>
                                            <td><input name="description[]" type="text" class="form-control"></td>
                                            <td><input name="qty[]" type="number" class="form-control"></td>
                                            <td><input name="price[]" type="number" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input name="item[]" type="number" class="form-control"></td>
                                            <td><input name="description[]" type="text" class="form-control"></td>
                                            <td><input name="qty[]" type="number" class="form-control"></td>
                                            <td><input name="price[]" type="number" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input name="item[]" type="number" class="form-control"></td>
                                            <td><input name="description[]" type="text" class="form-control"></td>
                                            <td><input name="qty[]" type="number" class="form-control"></td>
                                            <td><input name="price[]" type="number" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input name="item[]" type="number" class="form-control"></td>
                                            <td><input name="description[]" type="text" class="form-control"></td>
                                            <td><input name="qty[]" type="number" class="form-control"></td>
                                            <td><input name="price[]" type="number" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input name="item[]" type="number" class="form-control"></td>
                                            <td><input name="description[]" type="text" class="form-control"></td>
                                            <td><input name="qty[]" type="number" class="form-control"></td>
                                            <td><input name="price[]" type="number" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input name="item[]" type="number" class="form-control"></td>
                                            <td><input name="description[]" type="text" class="form-control"></td>
                                            <td><input name="qty[]" type="number" class="form-control"></td>
                                            <td><input name="price[]" type="number" class="form-control"></td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>กำหนดยื่นราคา/Quotation Valid for</label>
                                            <input name="quotation" type="text" class="form-control"
                                                   placeholder="วัน/Day">
                                        </div>
                                        <div class="form-group">
                                            <label>กำหนดส่งสินค้า/Delivery Time</label>
                                            <input name="delivery" type="text" class="form-control"
                                                   placeholder="วัน/Day">
                                        </div>
                                        <div class="form-group">
                                            <label>เงินมัดจำ</label>
                                            <input name="deposit" type="number" class="form-control"
                                                   placeholder="%">
                                        </div>
                                        <div class="form-group">
                                            <label>เงื่อนไขการชำระเงิน</label>
                                            <input name="condition" type="text" class="form-control"
                                                   placeholder="วัน/Day">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea name="note" class="form-control" style="max-width: 100%" rows="5"
                                                      placeholder="Note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                {{--<a  href="{{ url('dashboard') }}" class="btn btn-default">Cancel</a>--}}
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus"></i> เพิ่ม
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>

    </div>
@endsection


@push('scripts')
<script>

</script>

@endpush
