<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background-color: #666666; background-image:linear-gradient(to left, rgba(0,0,0,0.7),rgba(11, 46, 0, 0.1)),  url(../images/Tagaytay_City_Hall_1.jpg ); background-repeat: no-repeat; background-size: 1400px;">
<div class="login-box">
  	<div class="login-logo"  style="color:white; ">
      
  		
  	</div>
  
  	<div class="login-box-body" style="background-color: #772222; border-radius:10px; text-align: center;">

	  <img style="border-radius: 50%;" src="../images/citylogo.jpg" width="150px" height="150px"><br><br>
    	<h2 style="color: #ffeded" class="login-box-msg"><strong>ADMIN LOGIN</strong></p><h2></h2>
    	<form action="login.php" method="POST" >
      		<div class="form-group has-feedback">
        		<input style="border-radius: 10px;" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input style="border-radius: 10px;" type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-20" style="text-align: center;">
          			<button type="submit" class="btn btn-primary" name="login"><strong>Sign In</strong></button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>