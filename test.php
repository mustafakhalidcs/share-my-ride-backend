<?php 
$sql="SELECT r.plan_id,r.email,r.rider_plan_id,r.driver_email,
	u.first_name , u.last_name , u.email,
	p.current_location , p.destination ,p.departure_date
	from requests r, users u , plan p , riderplan rid
	where u.email='$driveremail'
	AND p.plan_id = rid.plan_id
	AND r.isCaught = 0
	AND u.email = r.email
	AND p.plan_id =r.rider_plan_id
	";
 ?>