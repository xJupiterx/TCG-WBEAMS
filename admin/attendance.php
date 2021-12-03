<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              
              <a href="attendance_upload.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Upload Attendance</a>
              <!-- download attendance table -->
              <?php
                include 'includes/conn.php'; 
                $conn->set_charset("utf8");
                $exp_table = "tbl_attendance"; // Table to export
                if (!$conn)
                    die("ERROR: Could not connect. " . mysqli_connect_error());

                // Create and open new csv file
                $csv  = $exp_table . "-" . date('d-m-Y-his') . '.csv';
                $file = fopen($csv, 'w');

                // Get the table
                if (!$mysqli_result = mysqli_query($conn, "SELECT * FROM {$exp_table}"))
                    printf("Error: %s\n", $db->error);

                    // Get column names 
                    while ($column = mysqli_fetch_field($mysqli_result)) {
                        $column_names[] = $column->name;
                    }
                    
                    // Write column names in csv file
                    if (!fputcsv($file, $column_names))
                        die('Can\'t write column names in csv file');
                    
                    // Get table rows
                    while ($row = mysqli_fetch_row($mysqli_result)) {
                        // Write table rows in csv files
                        if (!fputcsv($file, $row))
                            die('Can\'t write rows in csv file');
                    }
                  fclose($file);
                  echo "<a href=\"$csv\" class='btn btn-primary btn-sm btn-flat'>Download</a>";
                ?>
                <a href="report.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>Print Report</a>
             
              
            </div>
            <div class="box-body table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time In</th>
                  <th>Break Time Out</th>
                  <th>Break Time In</th>
                  <th>Time Out</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, tbl_employee.employee_id AS empid, tbl_attendance.id AS attid FROM tbl_attendance LEFT JOIN tbl_employee ON tbl_employee.employee_id=tbl_attendance.employee_id ORDER BY tbl_attendance.date DESC, tbl_attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $attendTime = date('h:i A', strtotime($row['time_in'])); // time in ni employee
                      $aHour = substr($attendTime, -8,2); // return yung hour *00*:00 ng time-in ni employee
                      $aMins = substr($attendTime, -5,2); // return yung minutes 00:*00* ng time-in ni employee
                      $aHourMins = $aHour . $aMins; // pagsamahin yung hour at mins
                      $aHM_int = intval($aHourMins);
                      if($aHM_int<=700){
                        $timeinremarks = "<span class='label label-success pull-right'>ontime</span>";
                      }
                      else{
                        $timeinremarks = "<span class='label label-danger pull-right'>late</span>";
                      }

                      $boutTime = date('h:i A', strtotime($row['break_time_out'])); // break out ni employee
                      $btHour = substr($boutTime, -8,2); // return yung hour *00*:00 ng time-in ni employee
                      $btMins = substr($boutTime, -5,2); // return yung minutes 00:*00* ng time-in ni employee
                      $btHourMins = $btHour . $btMins; // pagsamahin yung hour at mins
                      $btHM_int = intval($btHourMins);
                      if(($btHM_int>=1200) and ($btHM_int<=1300)){
                        $breakoutremarks = "<span class='label label-success pull-right'>ontime</span>";
                      }
                      else{
                        $breakoutremarks = "<span class='label label-danger pull-right'>early-out</span>";
                      }

                      $breakTime = date('h:i A', strtotime($row['break_time_in'])); // break in ni employee
                      $bHour = substr($breakTime, -8,2); // return yung hour *00*:00 ng time-in ni employee
                      $bMins = substr($attendTime, -5,2); // return yung minutes 00:*00* ng time-in ni employee
                      $bHourMins = $bHour . $bMins; // pagsamahin yung hour at mins
                      $bHM_int = intval($bHourMins);
                      if((($bHM_int>=1200) and ($bHM_int<=1300)) or ($bHM_int==100)){
                        $breakinremarks = "<span class='label label-success pull-right'>ontime</span>";
                      }
                      else{
                        $breakinremarks = "<span class='label label-danger pull-right'>late</span>";
                      }

                      $outTime = date('h:i A', strtotime($row['time_out'])); // time in ni employee
                      $oHour = substr($outTime, -8,2); // return yung hour *00*:00 ng time-in ni employee
                      $oMins = substr($outTime, -5,2); // return yung minutes 00:*00* ng time-in ni employee
                      $oHourMins = $oHour . $oMins; // pagsamahin yung hour at mins
                      $oHM_int = intval($oHourMins);
                      if($oHM_int>=500){
                        $timeoutremarks = "<span class='label label-success pull-right'>ontime</span>";
                      }
                      else{
                        $timeoutremarks = "<span class='label label-danger pull-right'>early-out</span>";
                      }

                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".date('h:i A', strtotime($row['time_in'])).$timeinremarks."</td>
                          <td>".date('h:i A', strtotime($row['break_time_out'])).$breakoutremarks."</td>
                          <td>".date('h:i A', strtotime($row['break_time_in'])).$breakinremarks."</td>
                          <td>".date('h:i A', strtotime($row['time_out'])).$timeoutremarks."</td>
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['attid']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['attid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>

  <?php include 'includes/attendance_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.date);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_break_time_out').val(response.break_time_out);
      $('#edit_break_time_in').val(response.break_time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
