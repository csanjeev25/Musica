<?php
		
	include("../../config.php");

	if(isset($_POST['artistId'])){
		$artistId = $_POST['artistId'];
		$artistQuery = mysqli_query($conn,"SELECT * FROM artists WHERE id='$artistId'");

		$artistArray = mysqli_fetch_array($artistQuery);
		echo json_encode($artistArray);
	}

?>