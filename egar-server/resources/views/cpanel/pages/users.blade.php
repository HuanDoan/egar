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
                    <a href="#">Quản lý người dùng</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> QUẢN LÝ NGƯỜI DÙNG</h1>
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
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Danh sách</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a class="btn sbold green" href="{{route('cpanel.get.add.users')}}"> Add New User
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
                                    <th> Username </th>
                                    <th> Fullname </th>
                                    <th> Email </th>
                                    <th> Role </th>
                                    <th> Joined </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        {{$user->username}}
                                    </td>
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->role == 1)
                                        <span class="btn btn-xs red"> {{$user->permission->title}} </span>
                                        @endif
                                        @if($user->role == 2)
                                        <span class="btn btn-xs purple"> {{$user->permission->title}} </span>
                                        @endif    
                                        @if($user->role == 3)
                                        <span class="btn btn-xs green"> {{$user->permission->title}} </span>
                                        @endif  
                                        @if($user->role == 4)
                                        <span class="btn btn-xs default"> {{$user->permission->title}} </span>
                                        @endif    
                                        @if($user->role == 5)
                                        <span class="btn btn-xs dark"> {{$user->permission->title}} </span>
                                        @endif                                   
                                    </td>
                                    <td>
                                        {{date('d/m/Y', strtotime($user->created_at))}}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="loadUser(this)" data-value="{{$user->username}}" class="btn green btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <!-- <a href="javascript:void(0)" class="btn red btn-xs"><i class="fa fa-trash"></i> Remove</a> -->
                                        <a href="javascript:void(0)" data-link="{{route('cpanel.get.ban.user', $user->username)}}" onclick="banUser(this)" class="btn dark btn-xs"><i class="fa fa-ban"></i> Ban</a>
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
    <!-- END CONTENT BODY -->
</div>

@include('cpanel.include.user_modal')

@if(Session::has('editSuccess'))
<script>
    swal('Thành công!', 'Chỉnh sửa nguời dùng thành công', 'success');
</script>
@endif


@endsection