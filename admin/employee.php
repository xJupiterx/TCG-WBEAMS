<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible id='alert''>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible  id='alert''>
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
            <div class="box-header">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
           
            <div class="box-body">
              <table id="tables" class="table table-bordered ">
                <thead>
                 
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Position</th>
                  <th>Department ID</th>
                  <th>Status</th>
                  <th>Actions</th>
                </thead>
             
                <tbody>
                  <?php
                    $sql = "SELECT *, tbl_employee.id AS empid FROM tbl_employee LEFT JOIN tbl_position ON tbl_position.id=tbl_employee.position_id LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employee.schedule_id LEFT JOIN tbl_department ON tbl_department.id=tbl_employee.departs_id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['employee_id']; ?></td>
                          <td><?php echo $row['firstname'].'   '.$row['middlename'].'  '.$row['lastname']; ?></td>
                          <td><?php echo $row['address']; ?></td>                         
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['departs_id']; ?></td>
                          <td><?php echo $row['Estatus']; ?></td> 
                          <td>
                         
                            <button class="btn btn-success btn-sm edit" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-edit"></i> View / Edit</button>
                            <button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-trash"></i>Delete</button>
                          </td>
                        </tr>
                      <?php
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
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<script type="text/javascript">
  setTimeout(function(){
    document.getElementById("success").style.display = "none";
  }, 3000);


</script>

<!-- script of edit,delete button -->
<script>
  $(document).ready( function () {
    $('#tables').DataTable();
} );
</script>
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

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_middlename').val(response.middlename);
      $('#edit_extensionname').val(response.extensionName);
      $('#edit_address').val(response.address);
      $('#datepicker_edit').val(response.birthdate);
      $('#edit_contact').val(response.contact_info);
      $('#gender_val').val(response.gender).html(response.gender);
      $('#position_val').val(response.position_id).html(response.description);
      $('#day_offs').val(response.day_off);
      $('#edit_departs_id').val(response.departs_id);
    }
  });
}
</script>
</body>
</html>
