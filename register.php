<?php

include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getValue($value){
	if(isset($_POST[$value])){
		echo $_POST[$value];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Musica!!</title>
</head>
<body>
<div id="inputContainer">
	<form id="loginForm" action="register.php" method="POST">
		<h2>Login To Your Account</h2>
		<p><label for="loginUserName">Username</label>
		<input id="loginUserName" type="text" name="loginUserName" placeholder="e.g. canjeev25" required></p>
		<p><label for="loginPassword">Password</label>
		<input id="loginPassword" type="password" name="loginPassword" required></p>
		<button type="submit" name="loginButton">Log In</button>
	</form>

	<form id="registerForm" action="register.php" method="POST">
		<h2>Create Your Free Account</h2>
		<p>
		<?php echo $account->checkError(Constants::$userNameCharacters); ?>
		<label for="userName">Username</label>
		<input id="userName" type="text" name="userName" placeholder="e.g. canjeev25" value="<?php getValue('userName') ?>" required></p>
		<p><?php echo $account->checkError(Constants::$firstNameCharacters); ?><label for="firstName">First Name</label>
		<input id="firstName" type="text" name="firstName" placeholder="Sanjeev" value="<?php getValue('firstName') ?>" required></p>
		<p><?php echo $account->checkError(Constants::$lastNameCharacters); ?><label for="lastName">Last Name</label>
		<input id="lastName" type="text" name="lastName" placeholder="Chintakindi" value="<?php getValue('lastName') ?>" required></p>
		<p><?php echo $account->checkError(Constants::$emailsDoNotMatch); ?>
		<?php echo $account->checkError(Constants::$emailInvalid); ?><label for="email">Email</label>
		<input id="email" type="email" name="email" placeholder="sanjeevkumarchintakindi@gmail.com" value="<?php getValue('email') ?>" required></p>
		<p><label for="confirmEmail">Confirm Email</label>
		<input id="confirmEmail" type="email" name="confirmEmail" placeholder="sanjeevkumarchintakindi@gmail.com" value="<?php getValue('confirmEmail') ?>" required></p>
		<p><?php echo $account->checkError(Constants::$passwordsDoNotMatch); ?>
		<?php echo $account->checkError(Constants::$passwordsNotAlphaNumeric); ?>
		<?php echo $account->checkError(Constants::$passwordCharacter); ?><label for="password">Password</label>
		<input id="password" type="password" name="password" value="<?php getValue('password') ?>" required></p>
		<p><label for="confirmPassword">Confirm Password</label>
		<input id="confirmPassword" type="password" name="confirmPassword" value="<?php getValue('confirmPassword') ?>" required><p>
		<button type="submit" name="registerButton">SignUp</button>
	</form>
</div>
</body>
</html>