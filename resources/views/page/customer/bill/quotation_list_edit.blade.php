@extends('_layouts.master_layout')

@push('css')

@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                แก้ไขใบเสนอราคา LIST
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li><a href="{{ url('dashboard') }}">Customer</a></li>
                <li><a href="{{ url('dashboard/customer/'.$customer->id) }}">{{ $customer->company }}</a></li>
                <li><a href="{{ url('dashboard/customer/'.$customer->id.'/quotation_cash') }}">รายการใบเสนอราคา CASH</a>
                </li>
                <li><a href="{{ url('dashboard/customer/'.$customer->id.'/bills/'.$bill->id) }}">{{ $bill->topic }}</a>
                </li>
                <li class="active">แก้ไขใบเสนอราคา LIST</li>
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
                    <form method="post" action="{{ url('dashboard/customer/'.$customer->id.'/bill/'.$bill->id.'/update') }}">
                        {{ csrf_field() }}
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="form-group">
                                            <label>เรื่อง</label>
                                            <input type="hidden" name="type" value="quotation_list">
                                            <input type="text" name="topic" value="{{$bill->topic}}"
                                                   class="form-control" placeholder="ชื่อเรื่อง">
                                        </div>
                                        <div class="form-group">
                                            <label>ชื่อบริษัท</label>
                                            <input type="text" name="company" value="{{$bill->company}}"
                                                   class="form-control" placeholder="ชื่อบริษัท">
                                        </div>
                                        <div class="form-group">
                                            <label>เรียน ATTN</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$bill->name}}"
                                                   placeholder="เรียน ATTN">
                                        </div>
                                        <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea name="address" class="form-control" style="max-width: 100%"
                                                      placeholder="ที่อยู่">{{$bill->address}}</textarea>
                                        </div>


                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">วันที่</label>
                                            <input type="text" name="date" value="{{$bill->date}}"
                                                   class="form-control"
                                                   placeholder="วันที่">
                                        </div>
                                        <div class="form-group">
                                            <label>ผู้เสนอราคา</label>
                                            <input type="text" class="form-control" name="bidder" {{$bill->bidder}}
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
                                            <th width="10%" class="text-center">ลำดับ(item)</th>
                                            <th width="60%" class="text-center">รายการ(Description)</th>
                                            <th width="15%" class="text-center">จำนวน(qty.)</th>
                                            <th width="15%" class="text-center">หน่วย(Unit Price)</th>
                                        </tr>

                                        @foreach($bill->billLists as $list)
                                            <tr>
                                                <td><input name="item[]" type="number" class="form-control"
                                                           value="{{ $list->item }}"></td>
                                                <td><input name="description[]" type="text" class="form-control"
                                                           value="{{ $list->description }}"></td>
                                                <td><input onKeyPress="CheckNum()" name="qty[]" type="number" class="form-control"
                                                           value="{{ $list->qty }}"></td>
                                                <td><input name="price[]" type="text" onKeyUp="if(this.value*1!=this.value) this.value='' ;" class="form-control"
                                                           value="{{ $list->price }}"></td>
                                            </tr>
                                        @endforeach
                                        @for($i=$bill->billLists->count();$i<6;$i++)
                                            <tr>
                                                <td><input name="item[]" type="number" class="form-control"></td>
                                                <td><input name="description[]" type="text" class="form-control"></td>
                                                <td><input onKeyPress="CheckNum()" name="qty[]" type="number" class="form-control"></td>
                                                <td><input name="price[]" type="text" onKeyUp="if(this.value*1!=this.value) this.value='' ;" class="form-control"></td>
                                            </tr>
                                        @endfor

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
                                                   value="{{$bill->quotation}}"
                                                   placeholder="วัน/Day">
                                        </div>
                                        <div class="form-group">
                                            <label>กำหนดส่งสินค้า/Delivery Time</label>
                                            <input name="delivery" type="text" class="form-control"
                                                   value="{{$bill->delivery}}"
                                                   placeholder="วัน/Day">
                                        </div>
                                        <div class="form-group">
                                            <label>เงินมัดจำ</label>
                                            <input name="deposit" type="number" class="form-control"
                                                   value="{{$bill->deposit}}"
                                                   placeholder="%">
                                        </div>
                                        <div class="form-group">
                                            <label>เงื่อนไขการชำระเงิน</label>
                                            <input name="condition" type="text" class="form-control"
                                                   value="{{$bill->condition}}"
                                                   placeholder="วัน/Day">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea name="note" class="form-control" style="max-width: 100%" rows="5"
                                                      placeholder="Note">{{$bill->note}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                {{--<a  href="{{ url('dashboard') }}" class="btn btn-default">Cancel</a>--}}
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-pencil"></i> แก้ไข
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
<script language="javascript">
    function CheckNum(){
        if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
        }
    }
</script>

@endpush
