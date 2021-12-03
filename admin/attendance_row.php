<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, tbl_attendance.id AS attid FROM tbl_attendance LEFT JOIN tbl_employee ON tbl_employee.employee_id=tbl_attendance.employee_id WHERE tbl_attendance.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>