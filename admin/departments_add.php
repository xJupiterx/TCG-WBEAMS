<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$departments = $_POST['departments'];
		$shortname = $_POST['shortname'];
		$status = $_POST['status'];
		
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO tbl_department (departs_id, departments, shortname, status) VALUES ('$departs_id', '$departments', '$shortname', '$status')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Department added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: departments.php');
?>