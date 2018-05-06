<?php

session_start();

include_once 'connection_fj.php';
$user = json_decode($_POST["user"], true);
$username = trim($user["username"]);
$uemail = trim($user["email"]);
$password = $user["password"];
$ufname = $user["firstname"];
$ulname = $user["lastname"];
$address = $user["address"];
$address2 = $user["address2"];
$city = $user["city"];
$state = $user["state"];
$zipcode = $user["zipcode"];

$flag = array();
$i = 0;

$sql_email = "SELECT * FROM User WHERE uemail = '".$uemail."'";
$result_email = $conn->query($sql_email);
if ($result_email->num_rows > 0) {
	// been registered
	$flag[$i++] = "1";
}

if (strlen($password) < 6 || strlen($password) > 16) {
	// password length error
	$flag[$i++] = "2";
}

$sql_username = "SELECT * FROM User WHERE username = '".$username."'";
$result_username = $conn->query($sql_username);
if ($result_username->num_rows > 0) {
	// username registered
	$flag[$i++] = "3";
}

if (strlen($username) > 20) {
	// username length error
	$flag[$i++] = "4";	
}
if (strlen($ufname) > 20) {
	// firstname length error
	$flag[$i++] = "5";	
}
if (strlen($ulname) > 20) {
	// lastname length error
	$flag[$i++] = "6";	
}
if (strlen($zipcode) != 0) {
	if (!preg_match('#[0-9]{5}#', $zipcode)) {
		// invalid zipcode
		$flag[$i++] = "7";
	}
}

if ($i == 0) {
	$sql = "INSERT INTO User (username, uemail, password, ufname, ulname, last_login_time, address, address2, ucity, ustate, zipcode) VALUES ('".$username."', '".$uemail."', '".sha1($password)."', '".$ufname."', '".$ulname."', NOW(),'".$address."','".$address2."', '".$city."','".$state."','".$zipcode."')";

	if ($conn->query($sql) === TRUE) {
		// insert successfully
    	$flag[$i] = "0";
    	$_SESSION['session_user'] = $username;
	} else {
		// insertion failed
    	$flag[$i] = "8";
	}
}

echo json_encode($flag);

$conn->close();
?>