<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$inclusive_time_from = $_POST['inclusive_time_from'];
		$inclusive_time_from = date('H:i:s', strtotime($inclusive_time_from));
		$inclusive_time_to = $_POST['inclusive_time_to'];
		$inclusive_time_to = date('H:i:s', strtotime($inclusive_time_to));
		$schedule_type = $_POST['schedule_type'];
		$day_off = $_POST['day_off'];

		$sql = "UPDATE tbl_schedule SET inclusive_time_from = '$inclusive_time_from', inclusive_time_to = '$inclusive_time_to', schedule_type = '$schedule_type', day_off = '$day_off' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:schedule.php');

?>