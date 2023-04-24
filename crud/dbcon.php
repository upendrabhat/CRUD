<?php
	define("HOSTNAME", "localhost");
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DATABASE", "CRUD");
	
	$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
	
	if(!$connection){
		die("connection failed");
	}
?>