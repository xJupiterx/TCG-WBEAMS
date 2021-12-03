<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Employee</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="departments_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="departments" class="col-sm-3 control-label">Departments</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="departments" name="departments" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="shortname" class="col-sm-3 control-label">Shortname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="shortname" name="shortname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="status" id="status"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="departs_id"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="departments_edit.php">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_departments" class="col-sm-3 control-label">Departments</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_departments" name="departments">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_shortname" class="col-sm-3 control-label">Shortname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_shortname" name="shortname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_status" class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="status" id="edit_status"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="departs_id"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="departments_delete.php">
                <input type="hidden" class="empid" name="id">
                <div class="text-center">
                    <p>DELETE DEPARTMENT</p>
                    <h2 class="bold del_departs_name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>
