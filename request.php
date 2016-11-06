<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST['command']=='joinRequest'){
	$rider_id = $_REQUEST['email'];
	$driver_email = $_REQUEST['driver_email'];
	$plan_id = $_REQUEST['plan_id'];
	//$rider_plan_id = $_REQUEST['rider_plan_id'];
	$isCaught = 0;
	$notif_query = '';
	$status = 'pending';
	$query = "SELECT `plan_id` FROM `riderplan` order by `plan_id` desc LIMIT 1";
	$exec = mysqli_query($conn,$query);
	$num_rows = mysqli_num_rows($exec);
	$rider_plan = mysqli_fetch_assoc($exec);
	$rider_plan_id = $rider_plan['plan_id'];
	if($exec){
		if($num_rows > 0){
			$sql = "INSERT INTO `requests`(`request_id`, `email`, `driver_email`,`plan_id`,`rider_plan_id`,`isCaught`)
			VALUES ('','$rider_id','$driver_email','$plan_id','$rider_plan_id','$isCaught')";
			$run = mysqli_query($conn, $sql);
			if($run){
				$request_id = mysqli_insert_id($conn);
				$notif_sql = "INSERT INTO `notificationheader`(`notification_id`, `request_id`,`rider_plan_id`,`driver_plan_id`,`status`,`isCaught`) VALUES ('' , '$request_id','$rider_plan_id','$plan_id','$status','$isCaught')";
				$run_notif_sql = mysqli_query($conn , $notif_sql);
				if($run_notif_sql){
					echo 1;
				}
				else {
					echo mysqli_error($conn)."".$notif_sql;
				}
			}
			else{
				echo mysqli_error($conn)." ".$sql;
			}	
		}
	}
	else{
		echo myqli_error($conn)." ".$query;
	}
}
?>


