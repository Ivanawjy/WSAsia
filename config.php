<?php
	$WEB_CONFIG = [
	 'app_name' => 'WSAsia', 
	 'base_url' => 'http://119.13.104.161/'
	];
	// Database configuration 
	$dbHost     = "192.168.0.82"; 
	$dbUsername = "root"; 
	$dbPassword = "Michael1"; 
	$dbName     = "wsa"; 
	 
	// Create database connection 
	$con =  new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
	 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	} 
?>