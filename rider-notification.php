<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST['command']=='showNotifications'){
	$rideremail = $_REQUEST['rider_email'];
	$sql = "SELECT req.plan_id,req.rider_plan_id,req.email,req.driver_email,
	p.current_location,p.destination,p.departure_date,
	u.first_name , u.last_name,
	nh.status , nh.isCaught
	FROM plan p,requests req,users u , notificationheader nh
	WHERE req.email = '$rideremail'
	AND p.plan_id = req.rider_plan_id
	AND u.email = req.driver_email
	AND req.isCaught = 0
	AND p.plan_id = nh.rider_plan_id
	AND (nh.status = 'approved' OR nh.status = 'rejected')
	AND nh.isCaught = '0'
	order by p.plan_id desc;
	;
	";
	$run = mysqli_query($conn,$sql);
	$num_rows = mysqli_num_rows($run);
	if($num_rows > 0){
			while ($row=mysqli_fetch_assoc($run)) {
				$rows[]=$row;
			}
			echo json_encode($rows);
	}
	else{
		echo  0;
	}
}
?>



