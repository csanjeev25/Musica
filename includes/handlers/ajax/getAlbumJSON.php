<?php
		
	include("../../config.php");

	if(isset($_POST['albumId'])){
		$albumId = $_POST['albumId'];
		$albumQuery = mysqli_query($conn,"SELECT * FROM albums WHERE id='$albumId'");

		$albumArray = mysqli_fetch_array($albumQuery);
		echo json_encode($albumArray);
	}

?>