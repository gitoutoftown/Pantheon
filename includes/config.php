<?php
	ob_start();
	if(!session_id()) session_start();
	//session_start();

	
	$timezone = date_default_timezone_set("America/New_York");

	$con = mysqli_connect("localhost", "root", "", "Pantheon");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>