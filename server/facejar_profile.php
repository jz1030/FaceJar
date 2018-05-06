<?php

session_start();

include_once 'connection_fj.php';
$user = json_decode($_POST["user"], true);
$username = $user["username"];
$uemail = trim($user["email"]);
$password = $user["password"];
$ufname = $user["firstname"];
$ulname = $user["lastname"];
$address = $user["address"];
$address2 = $user["address2"];
$city = $user["city"];
$state = $user["state"];
$zipcode = $user["zipcode"];
$university = $user['university'];
$birthday = $user['birthday'];

$flag = array();
$i = 0;

if ((strlen($password) < 6 && strlen($password) > 0) || strlen($password) > 16) {
	// password length error
	$flag[$i++] = "2";
}

if (strlen($ufname) > 20 || strlen($ufname) == 0) {
	// firstname length error
	$flag[$i++] = "5";	
}
if (strlen($ulname) > 20 || strlen($ulname) == 0) {
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
	if (strlen($password) > 0) {
		$sql_password = "UPDATE User SET password = '".sha1($password)."' WHERE username ='".$username."'";
		if ($conn->query($sql_password) === TRUE) {
			// update successfully
		} else {
			// update failed
    		$flag[$i] = "8";
    	}
	}	

	$sql = "UPDATE User SET ufname = '".$ufname."',ulname = '".$ulname.
	"', address='".$address."',address2='".$address2."',ucity='".$city.
	"',ustate='".$state."',university='".$university."',zipcode='".$zipcode."', ubirthday = '".$birthday."' WHERE username ='".$username."'";

	if ($conn->query($sql) === TRUE) {
		// update successfully
    	$flag[$i] = "0";
	} else {
		// update failed
    	$flag[$i] = "8";
	}
}

echo json_encode($flag);

$conn->close();
?>