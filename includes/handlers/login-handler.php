<?php
if (isset($_POST['loginButton'])) {
	$username = $_POST['loginUserName'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username,$password);
	if($result == true){
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}else{
		//
	}
}
?>