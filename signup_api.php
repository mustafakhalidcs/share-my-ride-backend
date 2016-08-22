<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'inc/access_control.php';
// $data=json_decode(file_get_contents("php://input"));
// $name=mysql_real_escape_string($data->name);
// $password=mysql_real_escape_string($data->password);
// $role=mysql_real_escape_string($data->role);
include_once 'inc/connection.php';
$query="INSERT INTO `users`(`id`, `name`, `password`, `role`) VALUES ('','Ali','khan','manager')";
$result=mysqli_query($conn,$query);
if($result){
	echo "Congrats ";
}
else{
	echo "Some error occcured";
}
?>
