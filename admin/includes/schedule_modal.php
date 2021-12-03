<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_add.php">
          		  <div class="form-group">
                  	<label for="inclusive_time_from" class="col-sm-3 control-label">Inclusive Time From</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control timepicker" id="inclusive_time_from" name="inclusive_time_from" required>
                      </div>
                  	</div>
                </div>

                <div class="form-group">
                    <label for="inclusive_time_to" class="col-sm-3 control-label">Inclusive Time To</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="inclusive_time_to" name="inclusive_time_to" required>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="schedule_type" class="col-sm-3 control-label">Schedule Type</label>
                      
                    <div class="col-sm-9">
                    <select class="form-control" name="schedule_type" id="schedule_type" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM tbl_schedule";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['schedule_type']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="day_off" class="col-sm-3 control-label">Day Off</label>

                    <div class="col-sm-9">
                      <div>
                       <input type="text"  id="day_off" name="day_off" required>
                      </div>
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
            	<h4 class="modal-title"><b>Update Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_edit.php">
            		<input type="hidden" id="timeid" name="id">
                <div class="form-group">
                    <label for="edit_inclusive_time_from" class="col-sm-3 control-label">Inclusive Time From</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_inclusive_time_from" name="inclusive_time_from">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_inclusive_time_to" class="col-sm-3 control-label">Inclusive Time To</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_inclusive_time_to" name="inclusive_time_to">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_schedule_type" class="col-sm-3 control-label">Schedule Type</label>

                    <div class="col-sm-9">
                      <div>
                        <input type="text" id="edit_schedule_type" name="schedule_type">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_day_off" class="col-sm-3 control-label">Day Off</label>

                    <div class="col-sm-9">
                      <div>
                        <input type="text" id="edit_day_off" name="day_off">
                      </div>
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
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_delete.php">
            		<input type="hidden" id="del_timeid" name="id">
            		<div class="text-center">
	                	<p>DELETE SCHEDULE</p>
	                	<h2 id="del_schedule" class="bold"></h2>
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


     