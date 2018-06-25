<?php 

include("../../config.php");

if(isset($_POST['playlistId'])){
	$playlistId = $_POST['playlistId'];
	$playlistQuery = mysqli_query($conn,"DELETE FROM playlists WHERE id = '$playlistId'");
	$playlistQuery = mysqli_query($conn,"DELETE FROM playlistsongs WHERE playlist = '$playlistId'");
}else{
	echo("Playlist unavailable");
}

?>