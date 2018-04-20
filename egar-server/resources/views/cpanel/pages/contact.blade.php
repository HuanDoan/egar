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
                    <a href="{{ route('contact') }}">Danh sách liên hệ</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> LIÊN HỆ</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Danh sách liên hệ</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> Tên khách hàng </th>
                                    <th> Email </th>
                                    <th> Điện thoại </th>
                                    <th> Ngày gửi </th>
                                    <th> Tin nhắn </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>
                                        {{$contact->phone}}
                                    </td>
                                    <td>
                                        {{date('d/m/Y', strtotime($contact->created_at))}}
                                    </td>
                                    <td>
                                        {{$contact->content}}
                                    </td>
                                    <td>
                                        <a href="{{route('deletecontact', ['id'=>$contact->id])}}" class="btn red btn-xs"><i class="fa fa-trash-o"></i> Xóa</a>
                                        
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

    @if(Session::has('del_success'))
    <script>
        swal('Thành công!', 'Đã xóa!', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>
@endsection