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
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> QUẢN LÝ SẢN PHẨM</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Danh sách sản phẩm</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('product.add') }}" id="sample_editable_1_new" class="btn sbold green"> Thêm mới 
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> Tên sản phẩm </th>
                                    <th> Danh mục </th>
                                    <th> Trạng thái </th>
                                    <th> Giá </th>
                                    <th> Sp nổi bật </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        @if($product->status == 1)
                                        <span class="label label-sm label-info"> Còn hàng </span>
                                        @else
                                        <span class="label label-sm label-danger"> Hết hàng </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{number_format($product->unitPrice)}}
                                    </td>
                                    <td>
                                        @if($product->isHot == 0)
                                        <span class="label label-sm label-default"> Không </span>
                                        @else
                                        <span class="label label-sm label-danger"> Có </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('product.getEdit', ['id'=>$product->id])}}" class="btn green btn-xs"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                        <a href="{{route('product.delete', ['id'=>$product->id])}}" class="btn red btn-xs"><i class="fa fa-times"></i> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    @if(Session::has('msg_del'))
    <script>
        swal('Thành công!', 'Xóa sản phẩm thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>
@endsection