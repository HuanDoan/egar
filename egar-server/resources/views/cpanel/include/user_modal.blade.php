<div id="userModal" class="modal fade" tabindex="-1" data-width="960">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit User</h4>
    </div>
    <div class="modal-body">
        <form enctype="multipart/form-data" id="EditUserForm" method="post" action="{{route('cpanel.post.update.user')}}" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="current_username" value="">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="Username" class="col-sm-3 control-label">Username:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9">
                            <input disabled type="email" class="form-control" id="Email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-3 control-label">Mật khẩu mới:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="Password" name="password" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ConfirmPassword" class="col-sm-3 control-label">Nhập lại:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="ConfirmPassword" name="confirm_password" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Ảnh đại diện</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Select image </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="avatar"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">NOTE!</span><br><br> 
                                Kích thước file lớn nhất: <strong>3 MB</strong>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- column 2 -->
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="Fullname" class="col-sm-3 control-label">Họ và tên:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Fullname" name="fullname" placeholder="Họ và tên" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="col-sm-3 control-label">Điện thoại:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Phone" name="phone" placeholder="Điện thoại" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Role" class="col-sm-3 control-label">Role:</label>
                        <div class="col-sm-9">
                            <select name="role" id="Role" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Status" class="col-sm-3 control-label">Trạng thái: </label>
                        <div class="col-sm-9">
                            <select name="status" id="Status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
        <button type="button" class="btn green" id="btnSave">Save changes</button>
    </div>
</div>