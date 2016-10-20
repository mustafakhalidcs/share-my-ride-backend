<?php
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
switch ($_REQUEST['command']) {
	case 'markAsRead':
		$plan_id = $_REQUEST['plan_id'];
		$sql = "UPDATE `requests` SET `isCaught`= 1
		WHERE `plan_id`='$plan_id'
		";
		$run = mysqli_query($conn,$sql);
		if($run){
			echo 1;
		}
		else{
			echo 0;
		}
		break;
	case 'manageRequest':
		$rider_plan_id = $_REQUEST['rider_plan_id'];
		$driver_plan_id = $_REQUEST['driver_plan_id'];
		if($_REQUEST['operation']=="accept")
			$status = "approved";
		elseif($_REQUEST['operation']=="reject")
			$status = "rejected";
		$sql = "UPDATE `notificationheader` SET `status`='$status'
		WHERE `rider_plan_id`='$rider_plan_id'";
		$run = mysqli_query($conn,$sql);
		if($run){
			$query = "UPDATE driverplan dp JOIN notificationheader nh
			ON dp.plan_id = nh.driver_plan_id
			JOIN riderplan rp
			ON rp.plan_id =nh.rider_plan_id 
			SET dp.available_seats = (dp.available_seats - rp.seats_required)
			";
			$exec = mysqli_query($conn,$query);
			if($exec){
				echo 1;
			}
			else{
				echo mysqli_error($conn)." ".$query;
			}
		}
		else{
			echo 0;
		}
	break;
	case 'markNotificationAsRead':
		$plan_id = $_REQUEST['plan_id'];
		$sql = "UPDATE `notificationheader` SET `isCaught`= 1
		WHERE `driver_plan_id`='$plan_id'
		";
		$run = mysqli_query($conn,$sql);
		if($run){
			echo 1;
		}
		else{
			echo 0;
		}
	break;

	
	default:
		echo "Error";
		break;
}
// if($_REQUEST['command']='markAsRead'){
// 	$plan_id = $_REQUEST['plan_id'];
// 	$sql = "UPDATE `requests` SET `isCaught`= 1
// 	WHERE `plan_id`='$plan_id'
// 	";
// 	$run = mysqli_query($conn,$sql);
// 	if($run){
// 		echo 1;
// 	}
// 	else{
// 		echo 0;
// 	}
// 	die();
// }
// else
// 	if($_REQUEST['command']=='manageRequest' && $_REQUEST['operation']=="accept" || $_REQUEST['operation']=="reject"){
// 	$rider_plan_id = $_REQUEST['rider_plan_id'];
// 	if($_REQUEST['operation']=="accept")
// 		$status = "approved";
// 	elseif($_REQUEST['operation']=="reject")
// 		$status = "rejected";
// 	$sql = "UPDATE `notificationheader` SET `status`='$status'
// 	WHERE `rider_plan_id`='$rider_plan_id'";
// 	$run = mysqli_query($conn,$sql);
// 	if($run){
// 		echo 1;
// 	}
// 	else{
// 		echo 0;
// 	}
// }
?>