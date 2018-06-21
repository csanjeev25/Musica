<?php

include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($conn);

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
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>

	<?php
		if(isset($_POST['registerButton'])){
			echo '<script> $(document).ready(function(){ 
				$("#loginForm").hide();
				$("#registerForm").show();
				});
				</script>';
		}else{
			echo '<script> 
				$(document).ready(function(){
				$("#loginForm").show();
				$("#registerForm").hide();
				});
				</script>';
		}
	 ?>

	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login To Your Account</h2>
					<p><label for="loginUserName">Username</label>
					<input id="loginUserName" type="text" name="loginUserName" placeholder="e.g. canjeev25" value="<?php getValue('loginUserName') ?>" required></p>
					<p><label for="loginPassword">Password</label>
					<input id="loginPassword" type="password" name="loginPassword" required></p>
					<button type="submit" name="loginButton">Log In</button>
					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? <u class="togglePage"><b><i>Signup here</i></b></u></span>
					</div>
					<p class="warningText">
					<?php echo $account->checkError(Constants::$loginFailed); ?></p>
				</form>

				<form id="registerForm" action="register.php" method="POST">
					<h2>Create Your Free Account</h2>

					<p>
					<label for="userName">Username</label>
					<input id="userName" type="text" name="userName" placeholder="e.g. canjeev25" value="<?php getValue('userName') ?>" required>
					<?php echo $account->checkError(Constants::$userNameCharacters); ?>
					</p>

					<p><label for="firstName">First Name</label>
					<input id="firstName" type="text" name="firstName" placeholder="e.g. Sanjeev" value="<?php getValue('firstName') ?>" required>
					<?php echo $account->checkError(Constants::$firstNameCharacters); ?>
					</p>

					<p><label for="lastName">Last Name</label>
					<input id="lastName" type="text" name="lastName" placeholder="e.g. Chintakindi" value="<?php getValue('lastName') ?>" required><?php echo $account->checkError(Constants::$lastNameCharacters); ?></p>

					<p><label for="email">Email</label>
					<input id="email" type="email" name="email" placeholder="e.g. sanjeevkumarchintakindi@gmail.com" value="<?php getValue('email') ?>" required>
					<?php echo $account->checkError(Constants::$emailsDoNotMatch); ?>
					<?php echo $account->checkError(Constants::$emailInvalid); ?>
					<?php echo $account->checkError(Constants::$emailAlreadyRegistered); ?>
					</p>

					<p><label for="confirmEmail">Confirm Email</label>
					<input id="confirmEmail" type="email" name="confirmEmail" placeholder="" value="<?php getValue('confirmEmail') ?>" required></p>

					<p><label for="password">Password</label>
					<input id="password" type="password" name="password" value="<?php getValue('password') ?>" required></p>

					<p><label for="confirmPassword">Confirm Password</label>
					<input id="confirmPassword" type="password" name="confirmPassword" value="<?php getValue('confirmPassword') ?>" required>
					<?php echo $account->checkError(Constants::$passwordsDoNotMatch); ?>
					<?php echo $account->checkError(Constants::$passwordsNotAlphaNumeric); ?>
					<?php echo $account->checkError(Constants::$passwordCharacter); ?>
					</p>

					<button type="submit" name="registerButton">SignUp</button>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? <u class="togglePage"><b><i>Log in.</i></b></u></span>
					</div>

				</form>
			</div>

			<div id="loginText">
				<h1>Get great Music, right now</h1>
				<h2>Listen to your favourite musicians</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlist</li>
					<li>Follow artists to keep upto date</li>
				</ul>
			</div>

		</div>
	</div>
</body>
</html>