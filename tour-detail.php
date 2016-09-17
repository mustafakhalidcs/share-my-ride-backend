<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST["command"]=="tourDetail"){
$plan_id = $_REQUEST['plan_id'];
	$sql = "SELECT user.first_name, user.last_name,user.email,user.mobile,
	pn.departure_date,pn.current_location,pn.destination,pn.modified_date,pn.plan_id,
	pn.role,pn.route,pn.smoker,pn.music_lover,
  	dr.available_seats,dr.per_head_charge,dr.vehical_type
 	FROM users user , plan pn , driverplan dr
	 WHERE user.email = pn.email
	 AND pn.plan_id = dr.plan_id
	 AND pn.plan_id = '$plan_id'
	 ";

	$run = mysqli_query($conn,$sql);
	if($run){
		while($row=mysqli_fetch_assoc($run)){
			$rows[]=$row;
		}
		echo json_encode($rows);
	}
}	 
?>
