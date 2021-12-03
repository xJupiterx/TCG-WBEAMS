<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Admin Profile</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Username</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="edit_departs_id" class="col-sm-3 control-label">User Level</label>

                    <div class="col-sm-9"> 
                    <select class="form-control" name="userlevel" id="userlevel">
                      <option selected value="<?php echo $user['userlevel']; ?>"><?php echo $user['userlevel']; ?></option> 
                      <option value="HR Officer">HR Officer</option> 
                      <option value="Department Head">Department Head</option> 
                      <option value="Employee">Employee</option> 
                    </select>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Email</label>

                  	<div class="col-sm-9">
                    	<input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_departs_id" class="col-sm-3 control-label">Question 1</label>

                    <div class="col-sm-9"> 
                    <select class="form-control" name="question1" id="question1">
                      <option selected value="<?php echo $user['question1']?>"><?php echo $user['question1']?></option> 
                      <option value="In what city were you born?">In what city were you born?</option> 
                      <option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option> 
                      <option value="What is your mothers maiden name?">What is your mother's maiden name?</option> 
                      <option value="What high school did you attend?">What high school did you attend?</option> 
                      <option value="What is the name of your first school?">What is the name of your first school?</option> 
                    </select>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Answer</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="answer" name="answer" value="<?php echo $user['answer1']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="edit_departs_id" class="col-sm-3 control-label">Question 2</label>

                    <div class="col-sm-9"> 
                    <select class="form-control" name="question2" id="question2">
                      <option selected value="<?php echo $user['question2']?>"><?php echo $user['question2']?></option> 
                      <option value="What was the make of your first car?">What was the make of your first car?</option> 
                      <option value="What was your favorite food as a child?">What was your favorite food as a child?</option> 
                      <option value="Where did you meet your spouse?">Where did you meet your spouse?</option> 
                      <option value="In what city does your nearest sibling live?">In what city does your nearest sibling live? </option> 
                      <option value="Where were you when you first heard about 9/11?">Where were you when you first heard about 9/11?</option> 
                    </select>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Answer</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="answer1" name="answer1" value="<?php echo $user['answer2']; ?>">
                  	</div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>