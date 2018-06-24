<?php
		
	include("../../config.php");

	if(isset($_POST['songId'])){
		$songId = $_POST['songId'];
		$songQuery = mysqli_query($conn,"UPDATE songs SET plays = plays+1 WHERE id='$songId'");
	}

?>