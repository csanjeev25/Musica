<?php include("includes/header.php"); ?>

<?php
	if(isset($_GET['id'])){
		$albumId = $_GET['id'];
	}else{
		header("Location: index.php");
	}

	$albumQuery = mysqli_query($conn,"SELECT * FROM albums WHERE id = '$albumId'");
	$album = mysqli_fetch_array($albumQuery);

	$artistId = $album['artist'];

	$artistQuery = mysqli_query($conn,"SELECT name FROM artists WHERE id='$artistId'");
	$artist = mysqli_fetch_array($artistQuery);
	echo $artist['name'];
 ?>

<?php include("includes/footer.php"); ?>