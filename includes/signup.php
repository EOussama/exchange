<?php

	require "database.php";

	$username = $con->real_escape_string(htmlspecialchars($_POST['signup-username']));
	$email = $con->real_escape_string(htmlspecialchars($_POST['signup-email']));
	$password = $con->real_escape_string(htmlspecialchars($_POST['signup-password']));
	$city = $con->real_escape_string(htmlspecialchars($_POST['signup-city']));
	$state = $con->real_escape_string(htmlspecialchars($_POST['signup-states']));

	$query = "INSERT INTO `users`(`username`, `password`, `email`, `city`, `state`) VALUES('$username', '$password', '$email', '$city', '$state');";
	$con->query($query);
	
	$con->close();
	header('Location: \exchange\index.php');