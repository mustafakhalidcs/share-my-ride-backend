<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_POST['command']=='loginRequest'){
	$name=$_POST['name'];
	$password=$_POST['password'];
	$query="SELECT * FROM `users` WHERE name='$name' && password='$password'";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);
			if($row){
			return true;
		}
		else{
			return false;
		}
		
}
 ?>

