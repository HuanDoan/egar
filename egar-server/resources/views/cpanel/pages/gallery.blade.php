@extends('admincp.master')
@section('pageContent')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="{{route('gallery.getgallery')}}">Gallery</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Hình ảnh
                        </h1>
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
                                <form enctype="multipart/form-data" action="{{route('gallery.postgallery')}}" method="post">
                                    {{csrf_field()}}
                                    <label for="image" class="btn green"><i class="fa fa-plus"></i> Thêm hình ảnh</label>
                                    <button type="submit" class="btn blue">Upload</button>
                                    <input type="file" name="image" id="image" class="form-control hidden" accept="image/*" required>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            @foreach($photos as $photo)
                            <div class="col-md-3">
                                <div class="glr-thumb">
                                    <div class="glr-thumb-img" style="background-image: url('{{$photo->path}}');">&nbsp;</div>
                                    <div class="action">
                                        <a href="{{$photo->path}}" class="btn blue btn-sm" target="_blank">Xem chi tiết</a>
                                        <a href="{{route('gallery.deletegallery', ['id' => $photo->id])}}" class="btn red btn-sm delete-img">Xóa</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                {{$photos->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                @if(Session::has('upload_done'))
                <script>
                    swal('Thành công!', 'Upload thành công', 'success');
                </script>
                @endif
                @if(Session::has('delete_done'))
                <script>
                    swal('Thành công!', 'Xóa thành công', 'success');
                </script>
                @endif
@endsection