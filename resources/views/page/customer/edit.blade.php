@extends('_layouts.master_layout')

@push('css')

@endpush
@section('content')
    <div class="container-fluid content">
        <section class="content-header">
            <h1>
                Edit Customer
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Home</a></li>
                <li><a href="{{ url('dashboard') }}">Customer</a></li>
                <li><a href="{{ url('dashboard/customer/'.$customer->id) }}">{{ $customer->company }}</a></li>
                <li class="active">Edit Customer</li>
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
                              action="{{ url('dashboard/customer/'.$customer->id.'/update') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อบริษัท</label>

                                    <div class="col-sm-8">
                                        <input name="company" type="text" class="form-control" placeholder="ชื่อบริษัท"
                                               value="{{$customer->company}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อผู้ติดต่อ</label>

                                    <div class="col-sm-8">
                                        <input name="name" type="text" class="form-control" placeholder="ชื่อผู้ติดต่อ"
                                               value="{{$customer->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ที่อยู่</label>

                                    <div class="col-sm-8">
                                        <textarea name="address" class="form-control"
                                                  placeholder="ที่อยู่">{{$customer->address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tel</label>

                                    <div class="col-sm-8">
                                        <input name="tel" type="tel" class="form-control" placeholder="Tel"
                                               value="{{$customer->tel}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile</label>

                                    <div class="col-sm-8">
                                        <input name="mobile" type="tel" class="form-control" placeholder="Mobile"
                                               value="{{$customer->mobile}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">อีเมล</label>

                                    <div class="col-sm-8">
                                        <input name="email" type="email" class="form-control" placeholder="อีเมล"
                                               value="{{$customer->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Website</label>

                                    <div class="col-sm-8">
                                        <input name="website" type="url" class="form-control" placeholder="Website"
                                               value="{{$customer->website}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">เลขที่ผู้เสียภาษี</label>

                                    <div class="col-sm-8">
                                        <input name="taxpayers" type="text" class="form-control"
                                               value="{{$customer->taxpayers}}"
                                               placeholder="เลขที่ผู้เสียภาษี">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ภาพหลัก</label>

                                    <div class="col-sm-8">
                                        <input name="image" type="file" class="form-control" accept="image/*"
                                               placeholder="ภาพหลัก">
                                        @if($customer->image)
                                            <a href="{{ url($customer->image)  }}" target="_blank">
                                                <img class="img-responsive img-thumbnail"
                                                     style="margin-top: 20px;max-height: 100px"
                                                     src="{{ url($customer->image)  }}">
                                            </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ภาพประกอบ</label>

                                    <div class="col-sm-8">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>รูป</th>
                                                <th class="text-center">ลบ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($customer->images as $image)
                                                <tr>
                                                    <td><a href="{{ url($customer->image)  }}" target="_blank">
                                                            <img class="img-responsive img-thumbnail"
                                                                 style="height: 60px"
                                                                 src="{{url($image->image)  }}">
                                                        </a></td>
                                                    <td class="text-center">
                                                        <a href="{{ url('dashboard/customer/'.$customer->id.'/image/'.$image->id.'/delete') }}"
                                                           onclick="return confirm('ยืนยันการลบ')"
                                                           class="btn btn-danger">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> ลบ
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <input name="images_more[]" type="file" class="form-control" accept="image/*"
                                               placeholder="ภาพประกอบ">
                                        <div id="img"></div>
                                        <button type="button" class="btn btn-warning addButton"
                                                style="margin-top: 10px">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                {{--<a  href="{{ url('dashboard') }}" class="btn btn-default">Cancel</a>--}}
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-pencil"></i> แก้ไข
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
