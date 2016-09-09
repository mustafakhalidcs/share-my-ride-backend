<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
$logged_in = false;
if($_POST['command']=='loginRequest'){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="SELECT * FROM `users` WHERE email='$email' && password='$password'";
	$result=mysqli_query($conn,$query);
	$num_rows=mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);
	if($num_rows == 1){
		echo 1;
	}
	else{
		echo 0;
	}
	
		
}
 ?>

