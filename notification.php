<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST['command']=='showNotifications'){
	$driveremail = $_REQUEST['driver_email'];
	$sql = "SELECT req.plan_id,req.rider_plan_id,req.email,req.driver_email,
	p.current_location,p.destination,p.departure_date,
	r.seats_required,
	u.first_name , u.last_name
	FROM plan p,requests req, riderplan r,users u
	WHERE p.plan_id = r.plan_id
	AND req.driver_email = '$driveremail'
	AND p.plan_id = req.rider_plan_id
	AND u.email = req.email
	AND req.isCaught = 0
	order by p.departure_date desc
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
	echo 0;	
	}
}
?>



