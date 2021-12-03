<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$extensionname = $_POST['extensionname'];
		$address = $_POST['address'];
		$schedule = $_POST['schedule_id'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$civil_status = $_POST['civil_status'];
		$birthdate = $_POST['birthdate'];
		$position = $_POST['position'];
		$department_id = $_POST['departs_id'];
		$day_off = $_POST['day_offs'];

		
		$sql = "UPDATE tbl_employee SET firstname = '$firstname', lastname = '$lastname',middlename = '$middlename', extensionName = '$extensionname', contact_info = '$contact', gender = '$gender', civil_status = '$civil_status', birthdate = '$birthdate',`address` = '$address', position_id = '$position',schedule_id = '$schedule', departs_id ='$department_id', day_offs = '$day_off' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: employee.php');
?>