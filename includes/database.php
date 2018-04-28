<?php

	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'db_exchange');

	$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if($con->connect_errno)
		echo "Error ".$con->connect_errno.": Unable to connect to the database.";