@extends('_layouts.master_layout')

@push('css')

@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                {{ $customer->company }}
                <small>Customer Detail</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li><a href="{{ url('dashboard') }}">Customer</a></li>
                <li class="active">{{ $customer->company }}</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">
                <div class="col-md-8">
                    <div class="box box-default">
                        <table class="table table-hover table-bordered">
                            <tbody>
                            <tr>
                                <td width="15%" style="text-align: right">ชื่อบริษัท</td>
                                <td>{{ $customer->company }}</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align: right">ชื่อผู้ติดต่อ</td>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align: right">ที่อยู่</td>
                                <td>{{ $customer->address }}</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align: right">Tel</td>
                                <td>{{ $customer->tel }}</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align: right">Mobile</td>
                                <td>{{ $customer->mobile }}</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align: right">อีเมล</td>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align: right">Website</td>
                                <td>{{ $customer->website }}</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align: right">Tax No.</td>
                                <td>{{ $customer->taxpayers }}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-md-3"><a
                                    href="{{ url('dashboard/customer/'.$customer->id.'/quotation_vat/add') }}"
                                    class="btn btn-info btn-block">ขอใบเสนอราคา VAT</a></div>
                        <div class="col-md-3"><a
                                    href="{{ url('dashboard/customer/'.$customer->id.'/quotation_cash/add') }}"
                                    class="btn btn-danger btn-block">ขอใบเสนอราคา CASH</a></div>
                        <div class="col-md-3"><a
                                    href="{{ url('dashboard/customer/'.$customer->id.'/quotation_list/add') }}"
                                    class="btn btn-success btn-block">ขอใบเสนอราคา LIST</a></div>
                        <div class="col-md-3"><a
                                    href="{{ url('dashboard/customer/'.$customer->id.'/quotation_bill/add') }}"
                                    class="btn btn-warning btn-block">เปิดใบเสร็จรับเงิน</a></div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-3"><a href="{{ url('dashboard/customer/'.$customer->id.'/quotation_vat') }}"
                                                 class="btn btn-info btn-block"><i class="fa fa-eye"></i>
                                ขอดูใบเสนอราคา VAT</a></div>
                        <div class="col-md-3"><a href="{{ url('dashboard/customer/'.$customer->id.'/quotation_cash') }}"
                                                 class="btn btn-danger btn-block"><i class="fa fa-eye"></i>
                                ขอดูใบเสนอราคา CASH</a></div>
                        <div class="col-md-3"><a href="{{ url('dashboard/customer/'.$customer->id.'/quotation_list') }}"
                                                 class="btn btn-success btn-block"><i class="fa fa-eye"></i>
                                ขอดูใบเสนอราคา LIST</a></div>
                        <div class="col-md-3"><a href="{{ url('dashboard/customer/'.$customer->id.'/quotation_bill') }}"
                                                 class="btn btn-warning btn-block"><i class="fa fa-eye"></i>
                                ขอดูใบเสร็จรับเงิน</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($customer->image)
                        <a href="{{ url($customer->image)  }}" target="_blank">
                            <img class="img-responsive img-thumbnail" src="{{ url($customer->image)  }}">
                        </a>
                    @endif
                    <div class="row">
                        @foreach ($customer->images as $image)
                            <div class="col-md-6" style="padding: 0px 15px 0px 15px;margin-top: 15px">
                                <a href="{{ url($customer->image)  }}" target="_blank">
                                    <img class="img-responsive img-thumbnail" src="{{url($image->image)  }}">
                                </a>
                            </div>

                        @endforeach
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
