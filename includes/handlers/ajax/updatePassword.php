<?php

include("../../config.php");

if(!isset($_POST['username'])){
	echo("ERROR : Could not set username");
	exit();
}

if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword1']) || !isset($_POST['newPassword2'])){
	echo "Not all passwords are set";
	exit();
}
if($_POST['oldPassword'] == "" || $_POST['newPassword1'] == "" || $_POST['newPassword2'] == ""){
	echo "Please fill in all fields";
	exit();
}

$username = $_POST['username'];
$oldPassword = $_POST['oldPassword'];
$newPassword1 = $_POST['newPassword1'];
$newPassword2 = $_POST['newPassword2'];

$oldmd5 = md5($oldPassword);
$passwordCheck = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$oldmd5'");
if(mysqli_num_rows($passwordCheck) != 1){
	echo "Password is incorrect";
	exit();
} 

if($newPassword1 == $newPassword2){
	echo "Passwords do not match";
	exit();
}

if(preg_match('/[^A-Za-z0-9@]/', $newPassword1)){
	echo "Your password must only contain letters and digit and few special characters";
	exit();
}

if(strlen($newPassword1) >30 || strlen($newPassword1) < 5){
	echo "Your username must be between 5 and 30 characters";
	exit();
}

$newmd5 = md5($newPassword1);
$query = mysqli_query($conn,"UPDATE users SET password='$newmd5' WHERE username='$username'");
echo "Update successful";

?>