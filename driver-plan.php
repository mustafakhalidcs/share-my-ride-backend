<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'inc/connection.php';
include_once 'inc/access_control.php';
$plan_msg = '';
$driver_plan_msg = '';
$rider_plan_msg = '';
if($_POST["command"]=="postplan"){
	print_r($_POST);
	$email = $_POST['email'];
	$destination = $_POST['destination'];
	$current_location =$_POST['current_location'];
	$route = $_POST['route'];
	$departure_date =$_POST['departure_date'];
	$modified_date = $_POST['modified_date'];
	$departure_time =$_POST['departure_time'];
	$smoker = $_POST['smoker'];
	$role = $_POST['role'];
	$music_listener = $_POST['music_listener'];
	$sql = "INSERT INTO `plan`(`plan_id`, `email`, `destination`, `current_location`, `route`, `departure_date`, `modified_date`, `departure_time`, `role`, `smoker`, `music_lover`) 
	VALUES ('','$email','$destination','$current_location','$route','$departure_date','$modified_date','$departure_time','$role','$smoker','$music_listener')";
	$run = mysqli_query($conn , $sql);
	if($run){
		$plan_msg="pp";
	}
	else{
		$plan_msg = "pnp";
		exit;
	}
	echo $plan_msg;
}

if($_POST["planof"]=="driver"){
	$plan_id=mysqli_insert_id($conn);
	$available_seats = $_POST['available_seats'];
	$per_head_charge =$_POST['per_head_charge'];
	$vehicle_type = $_POST['vehicle_type'];
	$vehicle_number = $_POST['vehicle_number'];
	$driver_sql = "INSERT INTO `driverplan`(`dp_id`, `plan_id`, `available_seats`, `per_head_charge`, `vehical_type`, `vehicle_number`, `notification_id`) 
	VALUES ('','$plan_id','$available_seats','$per_head_charge','$vehicle_type','$vehicle_number','')";
	$run_sql = mysqli_query($conn , $driver_sql);
	if($run_sql){
		$driver_plan_msg = 'dpp';
	}
	else{
		$driver_plan_msg = 'dpnp';
	}
	echo $driver_plan_msg;
	
} 
if($_POST["planof"]=="rider"){
	$plan_id=mysqli_insert_id($conn);
	$seats_required = $_POST['seats_required'];
	$rider_sql = "INSERT INTO `riderplan`(`rp_id`, `plan_id`, `seats_required`) VALUES ('','$plan_id','$seats_required')";
	$run_rider_sql = mysqli_query($conn , $rider_sql);
	if($run_rider_sql){
		$rider_plan_msg = 'rpp';
	}
	else{
		$rider_plan_msg = 'rpnp';
	}
	echo $rider_plan_msg;
	
} 
?>
