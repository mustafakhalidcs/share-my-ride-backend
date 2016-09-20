<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'inc/connection.php';
include_once 'inc/access_control.php';
	if($_REQUEST['command']=='profile'){
		$email = $_REQUEST['user_id'];
		$sql = "SELECT * FROM `users` WHERE email='$email'";
		$run = mysqli_query($conn , $sql);
		$num_rows = mysqli_num_rows($run);
		if($num_rows==1){
			$row = mysqli_fetch_assoc($run);
			echo json_encode($row);
		}
	}
?>
