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
                    <a href="{{ route('slider') }}">Quản lý slider</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> QUẢN LÝ SLIDER</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Danh sách slider</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('slider.getadd') }}" id="sample_editable_1_new" class="btn sbold green"> Thêm mới 
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
                                    <th> Tiêu đề </th>
                                    <th> Hình ảnh </th>
                                    <th> Liên kết </th>
                                    <th> Thứ tự </th>
                                    <th> Trạng thái </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{$slider->title}}</td>
                                    <td>
                                        <img src="{{$slider->image}}" style="max-width: 200px;">
                                    </td>
                                    <td>
                                        <a href="{{$slider->link}}">{{$slider->link}}</a>
                                    </td>
                                    <td>
                                        {{$slider->order}}
                                    </td>
                                    <td>
                                        @if($slider->status == 1)
                                        <span class="label label-sm label-info"> Active </span>
                                        @else
                                        <span class="label label-sm label-danger"> Deactive </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('slider.getedit', ['id'=>$slider->id])}}" class="btn green btn-xs"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                        <a href="{{route('slider.delete', ['id'=>$slider->id])}}" class="btn red btn-xs"><i class="fa fa-times"></i> Xóa</a>
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
    <!-- END CONTENT BODY -->
</div>
@endsection