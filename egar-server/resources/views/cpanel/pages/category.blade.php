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
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> QUẢN LÝ DANH MỤC</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Danh mục</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('category.getadd') }}" id="sample_editable_1_new" class="btn sbold green"> Thêm mới 
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
                                    <th> Tên danh mục </th>
                                    <th> Danh mục cha </th>
                                    <th> Sản phẩm </th>
                                    <th> Mô tả </th>
                                    <th> Ngày tạo </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if ($category->getParents == NULL)
                                        <span class="btn grey btn-xs">None</span>
                                        @else
                                        {{$category->getParents->name}}
                                        @endif
                                    </td>
                                    <td>
                                    @if(count($category->product) == 0)
                                    <span class="label label-sm label-danger"> 0 </span>
                                    @else
                                    <span class="label label-sm label-warning"> {{count($category->product)}}</span>
                                    @endif
                                    </td>
                                    <td>
                                        {{$category->description}}
                                    </td>
                                    <td>
                                        {{date('d/m/Y', strtotime($category->created_at))}}
                                    </td>
                                    <td>
                                        <a href="{{route('category.getedit', ['id'=>$category->id])}}" class="btn green btn-xs"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                        @if(!in_array($category->id, $rootCat))
                                        <a href="{{route('category.delete', ['id'=>$category->id])}}" class="btn red btn-xs"><i class="fa fa-times"></i> Xóa</a>
                                        @endif
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
        swal('Thành công!', 'Xóa thành công', 'success');
    </script>
    @endif

    @if(Session::has('del_error'))
    <script>
        swal('Lỗi!', 'Danh mục đang chứa sản phẩm!', 'warning');
    </script>
    @endif

    @if(Session::has('del_error_pr'))
    <script>
        swal('Lỗi!', 'Danh mục đang chứa danh mục khác!', 'warning');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>
@endsection