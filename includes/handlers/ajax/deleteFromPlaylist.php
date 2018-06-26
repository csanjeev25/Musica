<?php

include("../../config.php");

if(isset($_POST['playlistId']) && isset($_POST['songId'])){
		$playlistId = $_POST['playlistId'];
		$songId = $_POST['songId'];

		$query = mysqli_query($conn,"DELETE FROM playlistsongs WHERE playlist='$playlistId' AND song='$songId'");


	}else{
		echo("kuch tho gadbad hai daya");
	}
?>