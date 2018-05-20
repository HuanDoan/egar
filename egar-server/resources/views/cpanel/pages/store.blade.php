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
                    <a href="#">Quản lý cửa hàng</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> QUẢN LÝ CỬA HÀNG</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
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
                                        <a class="btn sbold green" href="{{route('cpanel.store.create')}}"> Add New Store
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
                                    <th> Name </th>
                                    <th> Image </th>
                                    <th> Address </th>
                                    <th> Created By </th>
                                    <th> Created At </th>
                                    <th> Status </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stores as $store)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        {{$store->name}}
                                    </td>
                                    <td><img width="200" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDW0_GfwJ549_8H7iUTPt1FQzYfh9vTNhp3hyLKzadSwJKLuzZ" alt=""></td>
                                    <td>{{$store->address}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm default">
                                            <span class="icon-user"></span> {{$store->createdBy->username}}
                                        </a></td>
                                    <td>
                                        {{date('d/m/Y', strtotime($store->created_at))}}
                                    </td>
                                    <td>
                                        @if($store->status == 1)
                                        <span class="btn btn-xs green"> Accepted </span>
                                        @endif
                                        @if($store->status == 0)
                                        <span class="btn btn-xs purple"> Pending </span>
                                        @endif                                   
                                    </td>
                                    <td>
                                        <a href="#" class="btn green btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="#" class="btn red btn-xs"><i class="fa fa-trash"></i> Remove</a>
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
@endsection