<?php

require ("includes/db_info_1705.inc.php");
session_start();

if (isset($_POST['email'])) {
    $user = $mysqli->real_escape_string($_POST['email']);
}else{
	die("Bro die please");
}	
	
if (isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['ID_number'])) {
    $first = $mysqli->real_escape_string($_POST['first_name']);
     $last = $mysqli->real_escape_string($_POST['last_name']);
      $id = $mysqli->real_escape_string($_POST['ID_number']);

}else{
	die("Bro die please");
}

if (isset($_POST['password'])) {
    $pass = $mysqli->real_escape_string($_POST['password']);
	$pass = hash('sha256', $pass);
}else{
	die("Bro die please");
}	


$stmt = $mysqli->prepare("Select ID_number From users WHERE email = ? ");
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id);
$count = $stmt->num_rows;

if($count != 0){
	$_SESSION["credentials"] = false;
	header("Location:signup.html");
}else{
	$admin = 1;
	$stmt = $mysqli->prepare("Insert INTO users(ID_number, Email, Password, First_name, Last_name, Is_admin) VALUES(?,?,?,?,?,?) ");
	$stmt->bind_param("ssssss",$id, $user, $pass, $first, $last, $admin);
	$stmt->execute();
	$_SESSION["credentials"] = true;
	header("Location:index.php");
}



?>