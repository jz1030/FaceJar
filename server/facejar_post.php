<?php
session_start();
include_once 'connection_fj.php';

$textarea_content = $_POST['exampleFormControlTextarea1'];

$name = $_FILES['inputGroupFile01']['name'];
$target_file = basename($_FILES["inputGroupFile01"]["name"]);

if (strlen($name) == 0 && strlen($textarea_content) == 0) {
	echo 'input_error';
	exit;
}

// only content
$post_type = 1;

// Select file type
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_photo = array("jpg","jpeg","png","gif");
$extensions_music = array("mp3","wav","m4a","aac","wma");
$extensions_video = array("mp4","avi","flv","mov","mpg");

// Check extension
if( in_array($fileType,$extensions_photo) ) {
	$post_type = 2;
} else if ( in_array($fileType,$extensions_music) ) {
	$post_type = 3;
} else if ( in_array($fileType,$extensions_video) ) {
	$post_type = 4;
}
 


$image =addslashes(file_get_contents($_FILES['inputGroupFile01']['tmp_name']));    
    
//insert form data in the database
$sql = "INSERT INTO Post (username, content, multimedia,pprivacy,ptype, ptime) VALUES ('".$_SESSION['session_user']."', '".$textarea_content."','".$image."', '4','".$post_type."', NOW())";
$insert = $conn->query($sql);
    
echo $insert?'ok':'err';

$conn->close();
?>