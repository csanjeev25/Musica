<?php 

include("../../config.php");

if(isset($_POST['playlistId']) && isset($_POST['songId'])){
		$playlistId = $_POST['playlistId'];
		$songId = $_POST['songId'];

		$orderIdQuery = mysqli_query($conn,"SELECT MAX(playlistorder) + 1 as playlistorder FROM playlistsongs WHERE playlist='$playlistId'");

		$row = mysqli_fetch_array($orderIdQuery);
		$order = $row['playlistorder'];

		$query = mysqli_query($conn,"INSERT INTO playlistsongs VALUES('','$songId','$playlistId','$order')");


	}else{
		header("Location: index.php");
	}
?>