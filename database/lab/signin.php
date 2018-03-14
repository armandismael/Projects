<?php

require ("includes/db_info_1705.inc.php");
session_start();

if (isset($_POST['email'])) {
    $user = $mysqli->real_escape_string($_POST['email']);
}else{
	die("Bro die please");
}	
	
if (isset($_POST['password'])) {
    $pass = $mysqli->real_escape_string($_POST['password']);
	$pass = hash('sha256', $pass);
}else{
	die("dont try to mess around bro ;)");
}	


$stmt = $mysqli->prepare("Select Is_admin, ID_number, First_name From users WHERE Email = ? AND Password = ? ");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($is_admin,$id, $name);
$count = $stmt->num_rows;
$stmt->fetch();

if($count == 0){
	$_SESSION["credentials"] = false;
	header("Location:signin.html");
}else{
	if($is_admin == 0){
	$_SESSION["admin"]=true;
	$_SESSION["credentials"] = true;
	$_SESSION["user_name"] = $name;
	header("Location:instructor.html");
	}
	$_SESSION["admin"]=false;
	$_SESSION["credentials"] = true;
	$_SESSION["user_name"] = $name;
	header("Location:index.php");
}


?>