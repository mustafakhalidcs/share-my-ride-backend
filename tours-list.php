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
 	$sql = "SELECT * FROM `plan`
	 	WHERE departure_date = '$departure_date'
	 	AND destination LIKE '%%$destination%%'
	 	AND role='driver'";
	 	
 	$run = mysqli_query($conn , $sql);
 	if($run){
 		while ($row = mysqli_fetch_assoc($run)) {
 			$rows[] = $row;
 		}
 		echo json_encode($rows);
 	}
 	else{
 		echo 'No people are moving to '.$destination.' at '.$departure_date;
 	}
 	
}
else{
	$sql = "SELECT user.first_name, user.last_name,user.email,pn.departure_date,pn.current_location,pn.destination,
 	pn.modified_date,pn.plan_id,pn.role,dr.available_seats,dr.per_head_charge,dr.vehical_type
 	FROM users user , plan pn , driverplan dr
	WHERE user.email = pn.email
	AND pn.plan_id = dr.plan_id
 	";
	$run = mysqli_query($conn,$sql);
	if($run){
		while ($row = mysqli_fetch_assoc($run)) {
			$rows[]=$row;
		}
		echo json_encode($rows);
	}
}

?>