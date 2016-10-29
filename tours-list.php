<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'inc/connection.php';
include_once 'inc/access_control.php';

if($_REQUEST['command']=="findpeople"){
 	$departure_date = $_REQUEST['departure_date'];
 	$destination = $_REQUEST['destination'];
 	$rider_email = $_REQUEST['email'];
 	$sql = "SELECT * FROM plan p , driverplan dp
	 	WHERE p.departure_date = '$departure_date'
	 	AND p.destination LIKE '%%$destination%%'
	 	AND p.role='driver'
		AND p.email != '$rider_email'
		AND dp.available_seats != 0
		AND p.plan_id = dp.plan_id
		";
 	$run = mysqli_query($conn , $sql);
 	if($run){
 		while ($row = mysqli_fetch_assoc($run)) {
 			$rows[] = $row;
 		}
 		echo json_encode($rows);
 	}
 	else{
 		echo 0;
 	}
 	exit;
 	
}
elseif ($_REQUEST['command']=='listAllTours') {
	$rider_email = $_REQUEST['email'];
	$sql = "SELECT user.first_name, user.last_name,user.email,
	pn.departure_date,pn.current_location,pn.destination,pn.departure_time,
 	pn.modified_date,pn.plan_id,pn.role,
 	dr.available_seats,dr.per_head_charge,dr.vehical_type,
 	user.mobile
 	FROM users user , plan pn , driverplan dr
	WHERE user.email = pn.email
	AND pn.plan_id = dr.plan_id
	AND user.email != '$rider_email'
	AND dr.available_seats != 0
	ORDER by pn.modified_date DESC
 	";
 	$run = mysqli_query($conn,$sql);
	if($run){
		while ($row = mysqli_fetch_assoc($run)) {
			$rows[]=$row;
		}
		echo json_encode($rows);
	}
	exit;
}
else{
	echo 'Illegal way of getting data';
	exit;
}

?>
