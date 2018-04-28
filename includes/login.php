<?php

	require "database.php";

	$username = $con->real_escape_string(htmlspecialchars($_POST['login-username']));
	$password = $con->real_escape_string(htmlspecialchars($_POST['login-password']));

	$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1;";
	$results = $con->query($query);

	if($results->num_rows == 0)
		echo "<script>alert('Username or password is incorrect!');</script>";
	else {
		session_start();
		$row = $results->fetch_assoc();
		
		$_SESSION['logged-in'] = true;
		$_SESSION['userid'] = $row['userid'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['city'] = $row['city'];
		$_SESSION['state'] = $row['state'];
	}
	
	$con->close();
	header('Location: \exchange\index.php');