<?php session_start(); ?>
<?php include 'header.php'; ?>

<body class="hold-transition login-page" style=" background-color: #666666; background-image:linear-gradient(to left, rgba(0,0,0,0.7),rgba(11, 46, 0, 0.1)),  url(./images/Tagaytay_City_Hall_1.jpg ); background-repeat: no-repeat; background-size: 1400px; backdrop-filter: blur(3px);">
<div class="login-box"  style=" color:white;">
  	<div class="login-logo">
      
  		
  	</div>
  
  	<div class="login-box-body"  style="background-color: #772222; border-radius:10px;">
    <center><img style="border-radius: 50%;" src="./images/citylogo.jpg" width="120px" height="120px">
      <h2><p style="color: #ffeded" id="date"></p></h2>
      <h3><p style="color: #ffeded" id="time" class="bold"></p></h3></center>
    	<h4 style="color: #ffeded" class="login-box-msg">Enter Employee ID</h4>

    	<form id="attendance">
          <div class="form-group">
            <select class="form-control" name="status" style="border-radius: 10px;">
              <option value="in">Time In</option>
              <option value="am_out">Break Time Out</option>
              <option value="pm_in">Break Time In</option>
              <option value="out">Time Out</option>
            </select>
          </div>
          <div class="form-group">
            
            <input type="hidden" name="time" id="setTime">

          </div>
      		<div class="form-group has-feedback">
        		<input style="border-radius: 10px;" type="text" class="form-control input-lg" id="employee" name="employee" required>
        		<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      		</div>
      		<div class="row">
    			<div class="col-xs-20" style="text-align: center;">
          			<button type="submit" class="btn btn-primary "name="signin"><strong>Sign In</strong></button>
        		</div>
      		</div>
    	</form>
  	</div>
		<div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
		<div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>
  		
</div>
	
<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
    $('#setTime').val(momentNow.format('hh:mm:ss'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>
</body>
</html>