@extends('_layouts.master_layout')

@push('css')

@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                Add Customer
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li><a href="{{ url('dashboard') }}">Customer</a></li>
                <li class="active">Add Customer</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-default">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data"
                              action="{{ url('dashboard/customer/add') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อบริษัท</label>

                                    <div class="col-sm-8">
                                        <input name="company" type="text" class="form-control" placeholder="ชื่อบริษัท">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อผู้ติดต่อ</label>

                                    <div class="col-sm-8">
                                        <input name="name" type="text" class="form-control" placeholder="ชื่อผู้ติดต่อ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ที่อยู่</label>

                                    <div class="col-sm-8">
                                        <textarea name="address" class="form-control" placeholder="ที่อยู่"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tel</label>

                                    <div class="col-sm-8">
                                        <input name="tel" type="tel" class="form-control" placeholder="Tel">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile</label>

                                    <div class="col-sm-8">
                                        <input name="mobile" type="tel" class="form-control" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">อีเมล</label>

                                    <div class="col-sm-8">
                                        <input name="email" type="email" class="form-control" placeholder="อีเมล">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Website</label>

                                    <div class="col-sm-8">
                                        <input name="website" type="url" class="form-control" placeholder="Website">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">เลขที่ผู้เสียภาษี</label>

                                    <div class="col-sm-8">
                                        <input name="taxpayers" type="text" class="form-control"
                                               placeholder="เลขที่ผู้เสียภาษี">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ภาพหลัก</label>

                                    <div class="col-sm-8">
                                        <input name="image" type="file" class="form-control" accept="image/*"
                                               placeholder="ภาพหลัก">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ภาพประกอบ</label>

                                    <div class="col-sm-8">
                                        <input name="images_more[]" type="file" class="form-control" accept="image/*"
                                               placeholder="ภาพประกอบ">
                                        <div id="img"></div>
                                        <button type="button" class="btn btn-warning addButton" style="margin-top: 10px">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                {{--<a  href="{{ url('dashboard') }}" class="btn btn-default">Cancel</a>--}}
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus"></i> เพิ่ม
                                </button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
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
