<?php
	if(isset($_POST['employee'])){
		$output = array('error'=>false);

		include 'conn.php';
		include 'timezone.php';

		$employee = $_POST['employee'];
		$timeNow = $_POST['time'];
		$status = $_POST['status'];

		$sql = "SELECT * FROM tbl_employee WHERE employee_id = '$employee'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$id = $row['employee_id'];

			$date_now = date('Y-m-d');

			if($status == 'in'){
				$sql = "SELECT * FROM tbl_attendance WHERE employee_id = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					$output['error'] = false;
					$output['message'] = 'You have timed in for today';
					
			echo json_encode($output);
				}
				else{
					//updates
					$sched = $row['schedule_id'];
					$lognow = date('H:i:s');
					$sql = "SELECT * FROM tbl_schedule WHERE id = '$sched'";
					$squery = $conn->query($sql);
					$srow = $squery->fetch_assoc();
					$logstatus = ($lognow > $srow['time_in']) ? 0 : 1;
					//
					$sql = "INSERT INTO tbl_attendance (employee_id, date, time_in,break_time_out, status,break_time_in,time_out,num_hr) VALUES ('$id', '$date_now','$timeNow', NOW(), '$logstatus','00:30:00','00:30:00',0)";
					if($conn->query($sql)){
						$output['error'] = false;
						$output['message'] = 'Time in: '.$row['firstname'].' '.$row['lastname'];
						
	echo json_encode($output);
					}
					else{
						$output['error'] = true;
						$output['message'] = $conn->error;
						
	echo json_encode($output);
					}
				}
			}
			else{
				$sql = "SELECT *, tbl_attendance.id AS uid FROM tbl_attendance LEFT JOIN tbl_employee ON tbl_employee.employee_id=tbl_attendance.employee_id WHERE tbl_attendance.employee_id = '$id' AND date = '$date_now'";
				$query = $conn->query($sql);
				if($query->num_rows < 1){
					$output['error'] = true;
					$output['message'] = 'Cannot Timeout. No time in.';
					
	echo json_encode($output);
				}
				else{
					$row = $query->fetch_assoc();
					if($row['time_out'] != '00:00:00'){
						$output['error'] = false;
						$output['message'] ='You have timed out for today';
						
	echo json_encode($output);
					}
					else{
						
						$sql = "UPDATE tbl_attendance SET time_out = NOW() WHERE id = '".$row['uid']."'";
						if($conn->query($sql)){
							$output['message'] = 'Time out: '.$row['firstname'].' '.$row['lastname'];

							$sql = "SELECT * FROM tbl_attendance WHERE id = '".$row['uid']."'";
							$query = $conn->query($sql);
							$urow = $query->fetch_assoc();

							$time_in = $urow['time_in'];
							$time_out = $urow['time_out'];

							$sql = "SELECT * FROM tbl_employee LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employee.schedule_id WHERE tbl_employee.id = '$id'";
							$query = $conn->query($sql);
							$srow = $query->fetch_assoc();

							if($srow['time_in'] > $urow['time_in']){
								$time_in = $srow['time_in'];
							}

							if($srow['time_out'] < $urow['time_in']){
								$time_out = $srow['time_out'];
							}

							$time_in = new DateTime($time_in);
							$time_out = new DateTime($time_out);
							$interval = $time_in->diff($time_out);
							$hrs = $interval->format('%h');
							$mins = $interval->format('%i');
							$mins = $mins/60;
							$int = $hrs + $mins;
							if($int > 4){
								$int = $int - 1;
							}

							$sql = "UPDATE tbl_attendance SET num_hr = '$int' WHERE id = '".$row['uid']."'";
							$conn->query($sql);
						}
						else{
							$output['error'] = true;
							$output['message'] = $conn->error;
							
	echo json_encode($output);
						}
					}
					
				}
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Employee ID not found';
			
	echo json_encode($output);
		}
		
	}
	

?>