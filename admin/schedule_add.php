<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$inclusive_time_from= $_POST['inclusive_time_from'];
		$inclusive_time_from = date('H:i:s', strtotime($inclusive_time_from));
		$inclusive_time_to = $_POST['inclusive_time_to'];
		$inclusive_time_to = date('H:i:s', strtotime($inclusive_time_to));
		$schedule_type = $_POST['schedule_type'];
		$day_off = $_POST['day_off'];


		$sql = "INSERT INTO tbl_schedule (inclusive_time_from, inclusive_time_to, schedule_type, day_off) VALUES ('$inclusive_time_from', 
		'$inclusive_time_to', '$schedule_type', '$day_off')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: schedule.php');

?>