<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST['command']=='fetchRidertours'){
	$rider_plan_id = $_REQUEST['rider_plan_id'];
	$driver_plan_id = $_REQUEST['driver_plan_id'];
	$sql = "SELECT p.current_location,p.destination,p.departure_date,
	p.plan_id , r.seats_required
	FROM plan p,riderplan r
	WHERE p.plan_id=r.plan_id
	order by p.departure_date desc
	";
	$run=mysqli_query($conn,$sql);
	if($run){
		while ($row=mysqli_fetch_assoc($run)) {
			$rows[]=$row;
		}
		echo json_encode($rows);
	}
	else{
		echo "You don\'t have tour plans";
	}
}
?>