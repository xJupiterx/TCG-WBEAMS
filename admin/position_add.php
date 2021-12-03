<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$salary_grade = $_POST['salary_grade'];
		$step_increment = $_POST['step_increment'];
		$monthly_salary = $_POST['monthly_salary'];


		$sql = "INSERT INTO tbl_position (`description`, `salary_grade`, `step_increment`, `monthly_salary`) VALUES ('$title', '$salary_grade', '$step_increment', '$monthly_salary')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: position.php');

?>