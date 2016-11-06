<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'inc/connection.php';
include_once 'inc/access_control.php';


 	$sql = "SELECT * FROM `plan`";
 	$run = mysqli_query($conn , $sql);
 	if($run){
 		while ($row = mysqli_fetch_assoc($run)) {
 			$rows[] = $row;
 		}
 		echo json_encode($rows);
 	}
 

?>
