<?php
		
	include("../../config.php");

	if(isset($_POST['songId'])){
		$songId = $_POST['songId'];
		$songQuery = mysqli_query($conn,"SELECT * FROM songs WHERE id='$songId'");

		$songArray = mysqli_fetch_array($songQuery);
		echo json_encode($songArray);
	}

?>