@extends('admincp.master')
@section('pageContent')

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                <a href="{{ route('customer') }}">Danh sách khách hàng</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('customer.getedit', ['id'=>$customer->id]) }}">Chỉnh sửa</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> SỬA THÔNG TIN KHÁCH HÀNG: {{$customer->name}}</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        @if ($errors->any())
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-pencil"></i>Edit customer infomation </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('customer.postedit', ['id'=>$customer->id])}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tên khách hàng</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" required value="{{$customer->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control" required value="{{$customer->email}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Số điện thoại</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" class="form-control" required value="{{$customer->phone}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Địa chỉ</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" class="form-control" required value="{{$customer->address}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Thành phố</label>
                                    <div class="col-md-9">
                                        <input type="text" name="city" class="form-control" required value="{{$customer->city}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Quận/huyện</label>
                                    <div class="col-md-9">
                                        <input type="text" name="district" class="form-control" required value="{{$customer->district}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{ route('customer') }}" class="btn default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('edit_success'))
    <script>
        swal('Thành công!', 'Chỉnh sửa thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection