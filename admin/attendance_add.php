<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee = $_POST['employee'];
		$date = $_POST['date'];
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$break_time_out = $_POST['break_time_out'];
		$break_time_out = date('H:i:s', strtotime($break_time_out));

		$break_time_in = $_POST['break_time_in'];
		$break_time_in = date('H:i:s', strtotime($break_time_in));
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "SELECT * FROM tbl_employee WHERE employee_id = '$employee'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Employee not found';
		}
		else{
			$row = $query->fetch_assoc();
			$emp = $row['id'];

			$sql = "SELECT * FROM tbl_attendance WHERE employee_id = '$emp' AND date = '$date'";
			$query = $conn->query($sql);

			if($query->num_rows > 0){
				$_SESSION['error'] = 'Employee attendance for the day exist';
			}
			else{
				//updates
				$sched = $row['schedule_id'];
				$sql = "SELECT * FROM tbl_schedule WHERE id = '$sched'";
				$squery = $conn->query($sql);
				$scherow = $squery->fetch_assoc();
				$logstatus = ($time_in > $scherow['time_in']) ? 0 : 1;
				//
				$sql = "INSERT INTO tbl_attendance (employee_id, date, time_in, break_time_out, break_time_in, time_out,num_hr, status) VALUES ('$employee', '$date', '$time_in', '$break_time_out', '$break_time_in', '$time_out',0, '$logstatus')";
				if($conn->query($sql)){
					$_SESSION['success'] = 'Attendance added successfully';
					$id = $conn->insert_id;

					$sql = "SELECT * FROM tbl_employee LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employee.schedule_id WHERE tbl_employee.id = '$emp'";
					$query = $conn->query($sql);
					$srow = $query->fetch_assoc();

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

					$sql = "UPDATE tbl_attendance SET num_hr = '$int' WHERE id = '$id'";
					$conn->query($sql);

				}
				else{
					$_SESSION['error'] = $conn->error;
				}
			}
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	
	header('location: attendance.php');

?>