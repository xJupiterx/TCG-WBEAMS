<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$salary_grade = $_POST['salary_grade'];
		$step_increment = $_POST['step_increment'];
		$monthly_salary = $_POST['monthly_salary'];

		$sql = "UPDATE tbl_position SET description = '$title', salary_grade = '$salary_grade', step_increment = '$step_increment', monthly_salary = '$monthly_salary'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:position.php');

?>