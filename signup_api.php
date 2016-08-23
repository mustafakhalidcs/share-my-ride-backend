<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'inc/connection.php';
include_once 'inc/access_control.php';
	if($_POST['command']=='insert'){
		$name=$_POST['name'];
		$password=$_POST['password'];
		$role=$_POST['role'];
		$query="INSERT INTO `users`(`id`, `name`, `password`, `role`) VALUES ('','$name','$password','$role')";
		$result=mysqli_query($conn,$query);
			if($result){
				echo "Data inserted successfully";
			}
			else{
				echo "Some error occcured";
			}
	}
?>
