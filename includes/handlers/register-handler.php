<?php

function sanitizeForm($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText= ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}

if (isset($_POST['registerButton'])) {
	$username = sanitizeForm($_POST['userName']);
	$firstName = sanitizeFormString($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = sanitizeForm($_POST['email']);
	$confirmEmail = sanitizeForm($_POST['confirmEmail']);
	$password = sanitizeFormPassword($_POST['password']);
	$confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);

	$wasSuccessful = $account->register($username,$firstName,$lastName,$email,$confirmEmail,$password,$confirmPassword);
	if($wasSuccessful){
		header("Location: index.php");
	}
}
?>
