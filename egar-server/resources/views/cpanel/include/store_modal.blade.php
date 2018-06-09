<div id="editStoreModal" class="modal fade" tabindex="-1" data-width="960">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Store</h4>
    </div>
    <div class="modal-body">
        <form enctype="multipart/form-data" id="EditStoreForm" method="post" action="{{route('cpanel.post.update.user')}}" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="current_username" value="">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="StoreName" class="col-sm-3 control-label">Store name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="StoreName" name="name" placeholder="Store name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Address" class="col-sm-3 control-label">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Address" name="address" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="col-sm-3 control-label">Phone:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Phone" name="phone" placeholder="Phone" required>
                        </div>
                    </div>
                </div>
                <!-- column 2 -->
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="Lat" class="col-sm-3 control-label">Latitude:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Lat" name="lat" placeholder="Latitude" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Lng" class="col-sm-3 control-label">Longtitude:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Lng" name="lng" placeholder="Longtitude" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CreatedBy" class="col-sm-3 control-label">Created by:</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="CreatedBy" name="created_by" placeholder="Created by">
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