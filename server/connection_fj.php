<?php

	// Create connection
	$conn = new mysqli("127.0.0.1:8889","root","root","FaceJar");

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
    	exit;
	} 

?>