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
            @if($request->search)
                <p>ผลการค้นหา : "{{$request->search}}" {{ $customers->total() }} รายการ</p>
            @endif
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

                    @foreach ($customers as $customer)

                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->company }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->tel }}</td>
                            <td>{{ $customer->website }}</td>
                            <td class="text-center">

                                <a href="{{ url('dashboard/customer/'.$customer->id) }}" class="btn btn-info">
                                    <i class="fa fa-list" aria-hidden="true"></i> รายละเอียด
                                </a>
                                <a href="{{ url('dashboard/customer/'.$customer->id.'/edit') }}"
                                   class="btn btn-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข
                                </a>
                                <a href="{{ url('dashboard/customer/'.$customer->id.'/delete') }}"
                                   onclick="return confirm('ยืนยันการลบ')" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i> ลบ
                                </a>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                    <tfoot>
                    {{ $customers->links() }}
                    </tfoot>
                </table>
            </div>
        </section>

    </div>
@endsection


@push('scripts')


@endpush
