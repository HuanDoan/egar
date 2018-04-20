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
                <a href="{{ route('bill') }}">Danh sách đơn hàng</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('bill.getdetail', ['id'=>$bill->id]) }}">Chi tiết</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> CHI TIẾT ĐƠN HÀNG</h1>
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
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-archive"></i>Thông tin đơn hàng </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('bill.postedit', ['id'=>$bill->id])}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tổng giá trị đơn hàng</label>
                                    <div class="col-md-9">
                                        <h2 style="margin: 0"><span class="label label-success"> {{number_format($bill->total)}} VND</span></h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Thời gian đặt hàng</label>
                                    <div class="col-md-9">
                                        <p style="margin: 0; padding: 5px 0px;">{{date('H:i:s  d/m/Y', strtotime($bill->created_at))}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Phương thức thanh toán</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <label><input type="radio" name="payment" value="1" @if($bill->payment == 1) checked @endif /> Thanh toán khi nhận hàng </label>
                                            <label><input type="radio" name="payment" value="2" @if($bill->payment == 2) checked @endif /> Chuyển khoản </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Trạng thái</label>
                                    <div class="col-md-9">
                                        <select name="status" class="form-control">
                                            <option value="0" @if($bill->status == 0) selected @endif>New</option>@if($bill->status == 0) checked @endif
                                            <option value="1" @if($bill->status == 1) selected @endif>Pending</option>
                                            <option value="2" @if($bill->status == 2) selected @endif>Done</option>
                                            <option value="3" @if($bill->status == 3) selected @endif>Cancel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Note</label>
                                    <div class="col-md-9">
                                        <textarea name="note" class="form-control wysihtml5" rows="8">{{$bill->note}}</textarea></div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('bill') }}" class="btn default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
        <!-- CUSTOMER -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i>Thông tin khách hàng </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('customer.postedit', ['id'=>$bill->customer->id])}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tên khách hàng</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" required value="{{$bill->customer->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control" required value="{{$bill->customer->email}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Số điện thoại</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" class="form-control" required value="{{$bill->customer->phone}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Địa chỉ</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" class="form-control" required value="{{$bill->customer->address}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Thành phố</label>
                                    <div class="col-md-9">
                                        <input type="text" name="city" class="form-control" required value="{{$bill->customer->city}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Quận/huyện</label>
                                    <div class="col-md-9">
                                        <input type="text" name="district" class="form-control" required value="{{$bill->customer->district}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('bill') }}" class="btn default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->

        @foreach($bill->billDetail as $billDetail)

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered form-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cube"></i>{{$billDetail->product->name}} </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('bill.posteditdetail', ['id'=>$billDetail->id])}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-md-3">Hình ảnh</label>
                                <div class="col-md-9">
                                    <img src="{{$billDetail->product->image}}" style="max-width: 150px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Giá</label>
                                <div class="col-md-9">
                                    <h2 style="margin: 0"><span class="label label-default"> {{number_format($billDetail->unitPrice*$billDetail->quantity)}} VND</span></h2>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Đơn giá</label>
                                    <div class="col-md-9">
                                        <p style="margin: 0; padding: 5px 0px;">{{number_format($billDetail->unitPrice)}} VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Số lượng</label>
                                <div class="col-md-9">
                                    <input type="number" name="quantity" class="form-control" required value="{{$billDetail->quantity}}"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('bill') }}" class="btn default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    @if(Session::has('bill_edit'))
    <script>
        swal('Thành công!', 'Sửa thông tin đơn hàng thành công', 'success');
    </script>
    @endif
    @if(Session::has('edit_success'))
    <script>
        swal('Thành công!', 'Chỉnh sửa thông tin khách hàng thành công', 'success');
    </script>
    @endif
    @if(Session::has('prd_success'))
    <script>
        swal('Thành công!', 'Chỉnh sửa thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection