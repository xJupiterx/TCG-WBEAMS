<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo" style="background-color:#b23434;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style ="font-size: 60%; background-color:#b23434;"><b>CGT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style ="font-size: 70%;"><b>City Government Of Tagaytay</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#b23434;">
      <!-- Sidebar toggle button-->
      <a href="#"  style="background-color:#b23434;" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        
      </a>
      <h style ="font-family: Arial, Helvetica, sans-serif; font-size: 100%; color:white;">ㅤ<br>ㅤㅤEmployee'sㅤAttendance Monitoring System</h>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu"> 
              <li class="user-footer">
              	<div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat" style="background-color:#4d4d4d; color: white;">Sign out</a>
                </div>  ㅤㅤㅤ
                <div class="pull-right">
                  ㅤㅤㅤ
                  <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile" style="background-color:#0066ff; color: white;">ㅤEditㅤ</a>
                </div>
              
              </li>
            </ul>
          </li>
        </ul>
      </div>
     
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>