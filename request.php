<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST['command']=='joinRequest'){
	$rider_id = $_REQUEST['email'];
	$plan_id = $_REQUEST['plan_id'];
	$driver_email=$_REQUEST['driver_email'];
	$isCaught = 0;
	$sql = "INSERT INTO `requests`(`request_id`, `email`, `plan_id`,`driver_email`,`isCaught`) VALUES 
	('','$rider_id','$plan_id','$driver_email','$isCaught')";
	$run = mysqli_query($conn, $sql);
	if($run){
		$request_id = mysqli_insert_id($conn);
		$notif_sql = "INSERT INTO `notificationheader`(`notification_id`, `request_id`) VALUES ('' , '$request_id')";
		$run_notif_sql = mysqli_query($conn , $notif_sql);
		if($run_notif_sql){
			$notification_id = mysqli_insert_id($conn);
			$status = 'pending';
			$notif_query = "INSERT INTO `notificationdetail`(`notification_id`, `status`) VALUES 
			('$notification_id','$status')";
			if(mysqli_query($conn,$notif_query)){
				echo 1;
			}
			else echo mysqli_error($conn);
			
		}
		  echo mysqli_error($conn);
		
	}
	else{
		 echo mysqli_error($conn);
	}
}
 ?>


