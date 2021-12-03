
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background-color:#b23434; color: white;">
        <div class="pull-left image">
         ------------|ㅤ<img  src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">ㅤ|-------------- <br>
        </div>
      
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <hr>  
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="employee.php"><i class="fa fa-group"></i> Employee List</a></li>
        <li><a href="position.php"><i class="fa fa-suitcase"></i> Positions</a></li>    
        <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
        <li><a href="schedule.php"><i class="fa fa-clock-o"></i> Work Schedules</a></li>
        <li><a href="departments.php"><i class="fa fa-columns"></i> Departments</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>