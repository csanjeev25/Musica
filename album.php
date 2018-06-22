<?php include("includes/header.php"); ?>

<?php
	if(isset($_GET['id'])){
		$albumId = $_GET['id'];
	}else{
		header("Location: index.php");
	}

	$album = new Album($conn,$albumId);

	$artist = $album->getArtist();

 ?>

 <div class="entityInfo">
 	<div class="leftSection">
 		<img src="<?php echo $album->getArtworkPath(); ?>">
 	</div>
 	<div class="rightSection">
 		<h3><?php echo $album->getTitle(); ?></h3>
 		<p>By <?php echo $artist->getName();?></p>
 		<p><?php echo $album->getSongCount()." songs";?></p>
 	</div>
 </div>

<?php include("includes/footer.php"); ?>