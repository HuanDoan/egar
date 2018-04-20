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
                    <a href="{{ route('changepass') }}">Đổi mật khẩu</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Thay đổi mật khẩu</h1>
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
                            <i class="fa fa-plus"></i>Change password </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('postchangepass')}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Mật khẩu cũ</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Mật khẩu mới</label>
                                    <div class="col-md-9">
                                        <input type="password" name="newpass" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Xác nhận mật khẩu mới</label>
                                    <div class="col-md-9">
                                        <input type="password" name="reenter" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{ route('setting') }}" class="btn default">Cancel</a>
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
    @if(Session::has('success'))
    <script>
        swal('Thành công!', 'Thay đổi mật khẩu thành công', 'success');
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        swal('Lỗi!', '{{Session::get('error')}}', 'error');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection