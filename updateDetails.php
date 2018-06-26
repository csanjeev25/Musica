<?php

include("includes/includedFiles.php");

?>

<div class="userDetails">
	<div class="container borderBottom">
		<h2>EMAIL</h2>
		<input style="display: block; margin: 16px auto; height: 50px; width: 100%; background: #1f1f1f; border: none; font-size: 18px; font-weight: 300; padding: 0 20px" type="email" class="email" name="email" placeholder="Email address..." value="<?php echo($userLoggedIn->getEmail());?>" required>
		<span class="message"></span>
		<button class="button" onclick="updateEmail('email')" style="display: block; margin: 16px auto; height: 50px; width: 100%; background: #1f1f1f; border: none; font-size: 18px; font-weight: 300; padding: 0 20px">SAVE</button>
	</div>
	<div class="container">
		<h2>PASSWORD</h2>
		<input type="password" style="display: block; margin: 16px auto; height: 50px; width: 100%; background: #1f1f1f; border: none; font-size: 18px; font-weight: 300; padding: 0 20px" class="oldPassword" name="oldPassword" placeholder="Current Password" value="" required>
		<input type="password" style="display: block; margin: 16px auto; height: 50px; width: 100%; background: #1f1f1f; border: none; font-size: 18px; font-weight: 300; padding: 0 20px" class="newPassword" name="newPassword" placeholder="New Password" value="" required>
		<input type="password" style="display: block; margin: 16px auto; height: 50px; width: 100%; background: #1f1f1f; border: none; font-size: 18px; font-weight: 300; padding: 0 20px" class="newPassword2" name="newPassword2" placeholder="Confirm Password" value="" required>
		<span class="message"></span>
		<button class="button" style="display: block; margin: 16px auto; height: 50px; width: 100%; background: #1f1f1f; border: none; font-size: 18px; font-weight: 300; padding: 0 20px" 
		onclick="updatePassword('oldPassword','newPassword','newPassword2')">SAVE</button>
	</div>
</div>