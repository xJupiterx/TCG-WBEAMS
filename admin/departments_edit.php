<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$departments = $_POST['departments'];
		$shortname = $_POST['shortname'];
		$status = $_POST['status'];
		
		$sql = "UPDATE tbl_department SET departments = '$departments', shortname = '$shortname', status = '$status' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Department updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select department to edit first';
	}

	header('location: departments.php');
?>