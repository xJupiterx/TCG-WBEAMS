<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$extensionname = $_POST['extensionname'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$civil_status = $_POST['civil_status'];
		$birthdate = $_POST['birthdate'];
		$address = $_POST['address'];
		$position = $_POST['position'];
		$department_id = $_POST['departs_id'];
		$schedule_id = $_POST['schedule_id'];
		$employmentdate = date('Y-m-d');
		$day_off = $_POST['day_offs'];
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

		$sql = "INSERT INTO `tbl_employee`(`employee_id`, `firstname`, `lastname`, `middlename`, `extensionName`, `contact_info`, `gender`, `civil_status`, `birthdate`, `address`, `employmentDate`, `position_id`, `schedule_id`, `departs_id`,`day_offs`) VALUES ('$employee_id','$firstname','$lastname','$middlename','$extensionname','$contact','$gender','$civil_status','$birthdate','$address','$employmentdate','$position','$schedule_id','$department_id','$day_off')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee.php');
?>