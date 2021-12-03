<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$date = $_POST['edit_date'];
		$time_in = $_POST['edit_time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$break_time_out = $_POST['edit_break_time_out'];
		$break_time_out = date('H:i:s', strtotime($break_time_out));

		$break_time_in = $_POST['edit_break_time_in'];
		$break_time_in = date('H:i:s', strtotime($break_time_in));
		$time_out = $_POST['edit_time_out'];
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "UPDATE tbl_attendance SET date = '$date', time_in = '$time_in', break_time_out = '$break_time_out', break_time_in = '$break_time_in', time_out = '$time_out' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Attendance updated successfully';

			$sql = "SELECT * FROM tbl_attendance WHERE id = '$id'";
			$query = $conn->query($sql);
			$row = $query->fetch_assoc();
			$emp = $row['employee_id'];

			$sql = "SELECT * FROM tbl_employee LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employee.schedule_id WHERE tbl_employee.id = '$emp'";
			$query = $conn->query($sql);
			$srow = $query->fetch_assoc();

			//updates
			$logstatus = ($time_in > $srow['time_in']) ? 0 : 1;
			$logstatus = ($break_time_in > $srow['break_time_in']) ? 0 : 1;
			//

			if($srow['time_in'] > $time_in){
				$time_in = $srow['time_in'];
			}

			if($srow['break_time_out'] < $break_time_out){
				$break_time_out = $srow['break_time_out'];
			}

			$time_in = new DateTime($time_in);
			$break_time_out = new DateTime($break_time_out);
			$interval = $time_in->diff($break_time_out);
			$hrs = $interval->format('%h');
			$mins = $interval->format('%i');
			$mins = $mins/60;
			$int = $hrs + $mins;
			if($int > 4){
				$int = $int - 1;
			}

			if($srow['break_time_in'] > $break_time_in){
				$break_time_in = $srow['break_time_in'];
			}

			if($srow['time_out'] < $time_out){
				$time_out = $srow['time_out'];
			}

			$break_time_in = new DateTime($break_time_in);
			$time_out = new DateTime($time_out);
			$interval = $break_time_in->diff($time_out);
			$hrs = $interval->format('%h');
			$mins = $interval->format('%i');
			$mins = $mins/60;
			$int = $hrs + $mins;
			if($int > 4){
				$int = $int - 1;
			}

			$sql = "UPDATE tbl_attendance SET num_hr = '$int', status = '$logstatus' WHERE id = '$id'";
			$conn->query($sql);
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:attendance.php');

?>