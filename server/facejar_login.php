<?php

session_start();
include_once 'connection_fj.php';

$login = json_decode($_POST["login"], true);
$email = $login["email"];
$password = $login["password"];

$flag = array();

$sql_email = "SELECT * FROM User WHERE uemail = '".$email."'";
$result_email = $conn->query($sql_email);

if ($result_email->num_rows == 0) {
	// not registered
	$flag[0] = "2";
} else {
	$sql = "SELECT * FROM User WHERE uemail = '".$email."' AND password = '".sha1($password)."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		// success login
		$flag[0] = "1";
		while($row = $result->fetch_assoc()) {
    		$_SESSION['session_user'] = $row["username"];
    	} 
	} else {
		// password error
    	$flag[0] = "0";
	}
}

echo json_encode($flag);

$conn->close();
?>