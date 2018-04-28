<?php

	require "database.php";
	session_start();

	$_SESSION['logged-in'] = false;
	$_SESSION['username'] = '';
	$_SESSION['email'] = '';
	$_SESSION['city'] = '';
	$_SESSION['state'] = '';

	header('Location: \exchange\index.php');