<?php 
include_once 'inc/connection.php';
include_once 'inc/access_control.php';
if($_REQUEST['command']=='showUpcomingTours'){
	$email = $_REQUEST['email'];
	$sql="SELECT destination,current_location,departure_date
	FROM plan
	where email='$email'
	";
	$run = mysqli_query($conn,$sql);
		if($run){
			while ($row=mysqli_fetch_assoc($run)) {
				$rows[]=$row;
			}
			echo json_encode($rows);
		}
		else{
		echo $email." have no plans yet";	
		}
	
	
}
else{
	echo " Illegal way of getting information";
}
 ?>
}


