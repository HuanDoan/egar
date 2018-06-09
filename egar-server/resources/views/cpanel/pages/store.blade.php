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
                                    <td>
                                        @if($store->avatar != NULL)
                                        <img width="200" title="{{$store->name}}" src="{{$store->avatar}}" alt="{{$store->name}}">
                                        @else
                                        <img width="200" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" title="Have no image">
                                        @endif
                                    </td>
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
                                        @if($store->status == 2)
                                        <span class="btn btn-xs purple"> Pending </span>
                                        @endif   
                                        @if($store->status == 0)
                                        <span class="btn btn-xs dark"> Removed </span>
                                        @endif                                
                                    </td>
                                    <td>
                                        <a href="#" class="btn green btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        @if($store->status != 0)
                                        <a href="javascript:void(0)" data-link="{{route('cpanel.store.remove', $store->id)}}" onclick="removeStore(this)" class="btn red btn-xs"><i class="fa fa-trash"></i> Remove</a>
                                        @else
                                        <a href="javascript:void(0)" data-link="{{route('cpanel.store.delete', $store->id)}}" onclick="deleteStore(this)" class="btn dark btn-xs"><i class="fa fa-trash"></i> Delete</a>  
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
    @if(Session::has('removesuccess'))
    <script>
        swal('Thành công!', 'Remove Store thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>
@endsection