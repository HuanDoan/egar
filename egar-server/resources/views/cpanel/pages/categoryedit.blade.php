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
                    <a href="{{ route('category') }}">Quản lý danh mục</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('category.getedit', ['id'=>$category->id]) }}">Chỉnh sửa</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> SỬA DANH MỤC: {{$category->name}}</h1>
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
                            <i class="fa fa-pencil"></i>Edit category </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('category.postedit', ['id'=>$category->id])}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tên danh mục</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" required value="{{$category->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Danh mục cha</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="parent">
                                            <option value="0">None</option>
                                            @foreach($parents as $parent)
                                                <option value="{{$parent->id}}" {{($parent->id==$category->parent) ? 'selected' : ''}}>{{$parent->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Mô tả</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control wysihtml5" rows="8">{{$category->description}}</textarea></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Hình ảnh</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="{{$category->image}}" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE!</span><br><br> 
                                            Kích thước file lớn nhất: <strong>3 MB</strong>.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{ route('category') }}" class="btn default">Cancel</a>
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
    @if(Session::has('category_edit'))
    <script>
        swal('Thành công!', 'Chỉnh sửa danh mục thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection