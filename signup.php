<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'inc/connection.php';
include_once 'inc/access_control.php';
	if($_POST["command"]=="createUser"){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$mobile=$_POST['mobile'];
		$resident_of=$_POST['resident_of'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$nic=$_POST['NIC'];
		
		$query="INSERT INTO `users`(`user_id`, `first_name`, `last_name`, `mobile`, `resident_of`, `email`, `password`, `NIC`)
		 VALUES ('','$first_name','$last_name','$mobile','$resident_of','$email','$password','$nic')";
		$result=mysqli_query($conn,$query);
			if($result){
				echo 1;
			}
			else{

				echo $query." ".mysqli_error($conn);
			}
	}
	 
?>
