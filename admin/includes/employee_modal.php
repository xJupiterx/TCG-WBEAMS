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
            	<form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Middle Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="middlename" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Extension Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="extensionname" required>
                  	</div>
                </div>

                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact">
                    </div>
                </div>

               <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="gender" required>
                        <option value="" selected>- Select Gender -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="civil_status" class="col-sm-3 control-label">Civil Status</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="civil_status" id="civil_status" required>
                        <option value="" selected>- Select -</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Birthdate</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="birthdate">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="address">
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Position</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="position" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM tbl_position";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_departs_id" class="col-sm-3 control-label">Department ID</label>

                    <div class="col-sm-9"> 
                    <select class="form-control" name="departs_id" id="edit_departs_id">
                          <?php
                            $sql = "SELECT * FROM tbl_department";
                            $query = $conn->query($sql);
                            while($drow = $query->fetch_assoc()){
                              echo "
                                <option value='".$drow['id']."'>".$drow['departments']."</option>
                              ";
                            }
                          ?>
                      </select>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="schedule_id" class="col-sm-3 control-label">Schedule ID</label>

                    <div class="col-sm-9"> 
                    <select class="form-control" name="schedule_id" id="add_schedule_id">
                          <?php
                            $sql = "SELECT * FROM tbl_schedule";
                            $query = $conn->query($sql);
                            while($srow = $query->fetch_assoc()){
                              echo "
                                <option value='".$srow['id']."'>".$srow['inclusive_time_from'].' to '.$srow['inclusive_time_to']."</option>
                              ";
                            }
                          ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="day_off" class="col-sm-3 control-label">Day Off</label>

                    <div class="col-sm-9"> 
                    <select class="form-control" name="day_off" id="edit_schedule_id">
                      <option> - Select Dayoff - </option>
                    <?php
                                                   
                        $sql = "SELECT * FROM tbl_schedule";
                            $query = $conn->query($sql);
                            while($srow = $query->fetch_assoc()){
                              echo "
                                <option value='".$srow['id']."'>".$srow['day_off']."</option>
                              ";
                            }
                          ?>
                      </select>
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
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_edit.php">
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Middle Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_middlename" name="middlename">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Extension Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_extensionname" name="extensionname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="edit_gender">
                        <option selected id="gender_val"></option>
                        <option value="Male" >Male</option>
                        <option value="Female">Female</option>
                      
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="civil_status" class="col-sm-3 control-label">Civil Status</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="civil_status" id="civil_status" required>
                        <option value="" selected>- Select -</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Birthdate</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_edit" name="birthdate">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_address" name="address">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="edit_position" class="col-sm-3 control-label">Position</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="edit_position">
                        <option selected id="position_val"></option>
                        <?php
                          $sql = "SELECT * FROM tbl_position";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="edit_departs_id" class="col-sm-3 control-label">Department ID</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="departs_id" id="edit_departs_id">
                          <?php
                            $sql = "SELECT * FROM tbl_department";
                            $query = $conn->query($sql);
                            while($drow = $query->fetch_assoc()){
                              echo "
                                <option value='".$drow['id']."'>".$drow['departments']."</option>
                              ";
                            }
                          ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_departs_id" class="col-sm-3 control-label">Schedule ID</label>

                    <div class="col-sm-9"> 
                    <select class="form-control" name="schedule_id" id="edit_schedule_id">
                          <?php
                            $sql = "SELECT * FROM tbl_schedule";
                            $query = $conn->query($sql);
                            while($srow = $query->fetch_assoc()){
                              echo "
                                <option value='".$srow['id']."'>".$srow['inclusive_time_from'].' to '.$srow['inclusive_time_to']."</option>
                              ";
                            }
                          ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="day_offs" class="col-sm-3 control-label">Day Off</label>

                    <div class="col-sm-9"> 
                    <input type="text" class="form-control" name="day_offs" id="day_offs"> </input>
                    
                     
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
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE EMPLOYEE</p>
	                	<h2 class="bold del_employee_name"></h2>
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


