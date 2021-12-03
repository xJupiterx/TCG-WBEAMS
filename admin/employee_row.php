<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, tbl_employee.id as empid FROM tbl_employee LEFT JOIN tbl_position ON tbl_position.id=tbl_employee.position_id LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employee.schedule_id WHERE tbl_employee.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>