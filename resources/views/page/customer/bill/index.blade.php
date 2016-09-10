@extends('_layouts.master_layout')

@push('css')

@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                รายการ{{ $type }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li><a href="{{ url('dashboard') }}">Customer</a></li>
                <li><a href="{{ url('dashboard/customer/'.$customer->id) }}">{{ $customer->company }}</a></li>
                <li class="active"> รายการ{{ $type }}</li>
            </ol>
        </section>
        <section class="content">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr style="background-color: #d14f37;color: white">
                        <th width="5%" class="text-center">ID</th>
                        <th width="20%" class="text-center">เรื่อง</th>
                        <th width="20%" class="text-center">ผู้เสนอราคา</th>
                        <th width="15%" class="text-center">วันที่เสนอราคา</th>
                        <th width="20%" class="text-center">จัดการ</th>
                    </tr>

                    @foreach ($bills as $bill)

                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td class="text-center">{{ $bill->topic }}</td>
                            <td class="text-center">{{ $bill->name }}</td>
                            <td class="text-center">{{ $bill->date }}</td>
                            <td class="text-center">

                                <a href="{{ url('dashboard/customer/'.$customer->id.'/bills/'.$bill->id) }}"
                                   type="button" class="btn btn-info">
                                    <i class="fa fa-list" aria-hidden="true"></i> รายละเอียด
                                </a>
                                <a type="button" class="btn btn-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข
                                </a>
                                <a href="{{ url('dashboard/customer/'.$customer->id.'/bills/'.$bill->id.'/delete') }}"
                                   onclick="return confirm('ยืนยันการลบ')" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i> ลบ
                                </a>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                    <tfoot>
                    {{ $bills->links() }}
                    </tfoot>
                </table>
            </div>
        </section>

    </div>
@endsection


@push('scripts')


@endpush
