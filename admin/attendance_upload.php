<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
    include 'includes/conn.php';
    if (isset($_POST["import"])) {
        $fileName = $_FILES["file"]["tmp_name"];
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($fileName, "r");
            $find_header=1;
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                $find_header++;
                if( $find_header > 2 ) {
                    $insertEmployee = "INSERT into tbl_attendance (employee_id, date, time_in, break_time_out, status, break_time_in, time_out, num_hr)
                           values ('" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "'
                                       ,'" . $column[6] . "','" . $column[7] . "','" . $column[8] . "');";
                    $result = mysqli_query($conn, $insertEmployee);
                    if (!empty($result)) {
                        echo "<script>
                            alert('Database Successfully Uploaded');
                            window.location.href='attendance.php';
                        </script>";
                    } else {
                        echo    "<script>
                                    function myFunction(){
                                        alert('Problem Exporting Database');
                                    }
                                </script>";
                    }
                }
            }
        }
        echo "<script>
            alert('Please Select File!');
            window.location.href='attendance_upload.php';
        </script>";
    }
?>
</head>
<body>
    <form class="container" action="" method="post" name="uploadCSV" enctype="multipart/form-data">
        <center>
        <div class="p-3 mb-2 bg-warning text-dark" style="font-size: 50px; font-weight: bold;">EMPLOYEE UPLOAD ATTENDANCE</div>
            <hr>
        </center>
        <div>
            <center><label class="col-md-6 control-label" style = "position:relative; left:150px">Please select csv file</label></center>
            <input type="file" name="file" id="file" accept=".csv" class="col-md-6">
            <br><br>
            <center>    
            <button type="submit" id="submit" name="import" class="btn-submit" style="background-color: #9e9d9b; font-size:18px; position: relative; right: 20px" class="col-md-12">Import</button>
            </center>
        </div>
        <br><br>
        <div class="container">
            <a class="btn btn-info noprint" style="width: 100%;" href = 'attendance.php'>CANCEL UPLOAD ATTENDANCE</a>
        </div>   
    </form>
    
</body>
</html>