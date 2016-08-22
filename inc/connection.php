<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn=  mysqli_connect("localhost", "root", "", "student");
if(!$conn){
    echo '<h1>Error in Establising connection to Mysql</h1>'.mysqli_errno($conn);
}

?>

