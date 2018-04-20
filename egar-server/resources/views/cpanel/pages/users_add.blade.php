@extends('cpanel.master')
@section('pageContent')

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('cpanel.get.users') }}">Quản lý người dùng</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('cpanel.get.add.users') }}">Thêm mới</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> THÊM NGƯỜI DÙNG MỚI</h1>
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
                            <i class="fa fa-plus"></i>Add new user </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('cpanel.post.add.users')}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Username </br> <small>Username là duy nhất!</small></label>
                                    
                                    <div class="col-md-9">
                                        <input type="text" name="username" class="form-control" value="{{old('username')}}" required placeholder="Username không chứa ký tự đặc biệt"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Mật khẩu</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" class="form-control" value="{{old('password')}}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Xác nhận mật khẩu</label>
                                    <div class="col-md-9">
                                        <input type="password" name="confirm-password" class="form-control" value="{{old('confirm-password')}}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email </br> <small>Email là duy nhất!</small></label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" required placeholder="email@mail.com"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Trạng thái</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <label>
                                                <input type="radio" name="status" value="1" checked /> Active </label>
                                            <label>
                                                <input type="radio" name="status" value="0"/> Inactive </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Họ và tên</label>
                                    <div class="col-md-9">
                                        <input type="text" name="fullname" class="form-control" value="{{old('fullname')}}" required placeholder="Nguyễn Văn A"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Số điện thoại</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" required placeholder="+84123456789"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Quyền truy cập</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <select name="permission" class="form-control">
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{($role->id == 4)? 'selected' : ''}}>{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ảnh đại diện</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="avatar"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE!</span><br><br> 
                                            Kích thước file lớn nhất: <strong>3 MB</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{ route('cpanel.get.users') }}" class="btn default">Cancel</a>
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
    @if(Session::has('addsuccess'))
    <script>
        swal('Thành công!', 'Thêm sản nguời dùng thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection