<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST['command']=='showNotifications'){
	$driveremail = $_REQUEST['driver_email'];
	//$plan_id = $_REQUEST['plan_id'];
	//driver_id, rider_id , rider_name, plan_id,seats_required 
	// $sql="SELECT req.email,req.plan_id,req.driver_email,rider.seats_required
	// From requests req , riderplan rider, plan p 
	// where req.plan_id = p.plan_id
	// AND p.plan_id = rider.plan_id
	// AND p.email = '$driveremail'
	// AND req.isCaught = 0;
	// ";
	$sql="SELECT r.plan_id,r.email,r.driver_email ,
	u.first_name , u.last_name ,
	p.current_location , p.destination ,p.departure_date
	from requests r, users u , plan p
	where r.driver_email='$driveremail'
	AND r.isCaught = 0
	AND u.email = r.email
	AND r.plan_id = p.plan_id
	";
	$run = mysqli_query($conn,$sql);
		if($run){
			while ($row=mysqli_fetch_assoc($run)) {
				$rows[]=$row;
			}
			echo json_encode($rows);
		}
		else{
		echo "some error";	
		}
	
	
}
 ?>


