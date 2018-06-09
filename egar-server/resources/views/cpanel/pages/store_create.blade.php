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
                    <a href="{{ route('cpanel.store.index') }}">Quản lý cửa hàng</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('cpanel.store.create') }}">Thêm mới</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> THÊM CỬA HÀNG</h1>
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
                            <i class="fa fa-plus"></i>Add new STORE </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('cpanel.store.store')}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <!-- NAME FIELD -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tên Cửa hàng</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" required />
                                    </div>
                                </div>

                                <!-- ADDRESS FIELD -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Địa chỉ</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" class="form-control" required />
                                    </div>
                                </div>

                                <!-- DESC FIELD -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Mô tả</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control wysihtml5" rows="8"></textarea></div>
                                </div>

                                <!-- AVATAR FIELD -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Hình ảnh</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="avatar" accept="image/*"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- LOCATION FIELD -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" name="lat" class="form-control" required placeholder="Latitude"/>
                                        <br>
                                        <input type="text" name="lng" class="form-control" required placeholder="Longtitude"/>
                                        <br>
                                        <div id="">
                                            <div class="input-icon right">
                                                <i class="fa fa-search font-blue"></i>
                                                <input type="text" name="search" class="form-control" placeholder="Find a location">
                                                <br> 
                                            </div>
                                            <div id="Maps" class="map" style="width: 100%; height: 400px">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- PHONE FIELD -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Phone</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" class="form-control" required />
                                    </div>
                                </div>
                            </div>


                            
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{ route('cpanel.store.index') }}" class="btn default">Cancel</a>
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
        swal('Thành công!', 'Thêm sản phẩm thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection