<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style type="text/css" media="print">
        @media print{
            .noprint, .noprint *{
                display: none;
            }
        }
</style>   
</head>
<body onload = "print()">
<div class="container">
    <center>
    <div class="p-3 mb-2 bg-warning text-dark" style="font-size: 50px; font-weight: bold;">EMPLOYEE ATTENDANCE REPORT</div>
        <hr>
    </center>
   
    <table id="ready" class="table table-striped  table-bordered bg-warning" style="width: 100%;">
    <thead>
        <tr>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time In</th>
                  <th>Break Time Out</th>
                  <th>Break Time In</th>
                  <th>Time Out</th>

        </tr>
  </thead>
  <tbody>
                  <?php
                    $sql = "SELECT *, tbl_employee.employee_id AS empid, tbl_attendance.id AS attid FROM tbl_attendance LEFT JOIN tbl_employee ON tbl_employee.employee_id=tbl_attendance.employee_id ORDER BY tbl_attendance.date DESC, tbl_attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['status'])?'<span class="label label-success pull-right">ontime</span>':'<span class="label label-danger pull-right">late</span>';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".date('h:i A', strtotime($row['time_in'])).$status."</td>
                          <td>".date('h:i A', strtotime($row['break_time_out']))."</td>
                          <td>".date('h:i A', strtotime($row['break_time_in'])).$status."</td>
                          <td>".date('h:i A', strtotime($row['time_out']))."</td>
                         
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
                </table>
  <div class="container">
  <button type="" class="btn btn-info noprint" style="width: 100%;" onclick="window.location.replace('attendance.php');">CANCEL PRINTING</button>
  </div>
    

       
</div>
    
</body>
</html>