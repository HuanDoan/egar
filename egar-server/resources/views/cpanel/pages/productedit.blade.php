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
                    <a href="{{ route('product') }}">Quản lý sản phẩm</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('product.getEdit', ['id'=>$product->id]) }}">Chỉnh sửa</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Chỉnh sửa sản phẩm: <strong>{{$product->name}}</strong></h1>
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
                            <i class="fa fa-pencil"></i>Edit product </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('product.postEdit', ['id'=>$product->id])}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tên sản phẩm</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" required  value="{{$product->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Danh mục</label>
                                    <div class="col-md-9">
                                        <select name="category" class="form-control">
                                            @foreach($categories as $category)
                                            @if($category->id == $product->category->id)
                                            <option value="{{$category->id}}" selected>{{$category->name.' - '.$category->getParents->name}}</option>
                                            @else
                                            <option value="{{$category->id}}">{{$category->name.' - '.$category->getParents->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Trạng thái</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <label><input type="radio" name="status" value="1" @if($product->status == 1) checked @endif /> Còn hàng </label>
                                            <label><input type="radio" name="status" value="0" @if($product->status == 0) checked @endif /> Hết hàng </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Giá</label>
                                    <div class="col-md-9">
                                        <input type="number" name="price" class="form-control" required value="{{$product->unitPrice}}"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Đơn vị tính</label>
                                    <div class="col-md-9">
                                        <input type="text" name="unit" class="form-control" required value="{{$product->unit}}"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Là sản phẩm hot</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <label>
                                                <input type="radio" name="ishot" value="1" @if($product->isHot == 1) checked @endif  /> Có </label>
                                            <label>
                                                <input type="radio" name="ishot" value="0" @if($product->isHot == 0) checked @endif /> Không </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Mô tả</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control wysihtml5" rows="8">
                                        {{$product->description}}
                                        </textarea></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Hình ảnh</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="{{$product->image}}" alt="" /> </div>
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
                                            Kích thước file lớn nhất: <strong>3 MB</strong>.
                                            File ảnh nên là hình chữ nhật đứng! Tỉ lệ cr/cd=0.55</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{ route('product') }}" class="btn default">Cancel</a>
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
    @if(Session::has('msg_edit'))
    <script>
        swal('Thành công!', 'Sửa sản phẩm thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection