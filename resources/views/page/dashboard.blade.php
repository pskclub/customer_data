@extends('_layouts.master_layout')

@push('css')

@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                Customer List
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="active">Customer</li>
            </ol>
        </section>
        <section class="content">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr style="background-color: #d14f37;color: white">
                        <th width="5%" class="text-center">ID</th>
                        <th width="20%" class="text-center">ชื่อบริษัท</th>
                        <th width="20%" class="text-center">ชื่อผู้ติดต่อ</th>
                        <th width="15%" class="text-center">เบอร์โทรศัพท์</th>
                        <th width="20%" class="text-center">Website</th>
                        <th width="20%" class="text-center">จัดการ</th>
                    </tr>


                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td>www.goole.com</td>
                        <td class="text-center">

                            <button type="button" class="btn btn-info">
                                <i class="fa fa-list" aria-hidden="true"></i> รายละเอียด
                            </button>
                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</button>
                            <button type="button" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i> ลบ
                            </button>

                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </section>

    </div>
@endsection


@push('scripts')


@endpush
