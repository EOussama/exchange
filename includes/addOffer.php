<?php

	require "database.php";
	session_start();

	$wants = $con->real_escape_string(htmlspecialchars($_POST['wants']));
	$offers = $con->real_escape_string(htmlspecialchars($_POST['offers']));

	$query = "INSERT INTO `matches`(`userId`, `wants`, `offers`) VALUES(".$_SESSION['userid'].", '$wants', '$offers');";
	$con->query($query);
	
	$con->close();
	header('Location: \exchange\index.php');