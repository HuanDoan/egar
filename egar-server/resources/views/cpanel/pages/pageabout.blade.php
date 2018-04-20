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
                    <a href="{{ route('page.getabout') }}">Giới thiệu</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> TRANG GIỚI THIỆU</h1>
        <a href="{{route('home.getabout')}}" target="_blank" class="btn green" style="margin-bottom: 40px;">Xem trang</a>
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
                            <i class="fa fa-plus"></i>Trang giới thiệu </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form enctype="multipart/form-data" action="{{route('page.postabout')}}" method="post" class="form-horizontal form-bordered form-row-stripped">
                            {{csrf_field()}}
                            <input type="hidden" api-link="{{route('page.postabout')}}" name="_api">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tiêu đề</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control" required value="{{$pages[0]->title}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nội dung</label>
                                    <div class="col-md-9">
                                        <textarea name="summernote" id="summernote_1"> {{$pages[0]->content}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="button" class="btn green" id="btnSave">
                                            <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('page.getabout') }}" class="btn default">Cancel</a>
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
    @if(Session::has('page_success'))
    <script>
        swal('Thành công!', 'Chỉnh sửa nội dung thành công', 'success');
    </script>
    @endif
    <!-- END CONTENT BODY -->
</div>

@endsection