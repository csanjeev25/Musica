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

 <div class="trackListContainer">
 	<ul class="trackList">
 		<?php
 			$i=1;
 			$songIdArray = $album->getSongIds();

 			foreach ($songIdArray as $songId) {
 				$albumSong = new Song($conn,$songId);
 				$albumArtist = $albumSong->getArtist();

 				echo "<li class='trackListRow'>
 						<div class='trackCount'>
 							<img class='play' src='assets/images/icons/play-white.png'>
 							<span class='trackNumber'>$i</span>
 						</div>

 						<div class='trackInfo'>
 							<span class='trackName'>".$albumSong->getTitle()."</span>
 							<span class='artistName'>".$albumArtist->getName()."</span>
 						</div>

 						<div class='trackOptions'>
 							<img class='optionsButton' src='assets/images/icons/more.png'>
 						</div>

 						<div class='trackDuration'>
 							<span class='duration'>".$albumSong->getDuration()."</span>
 						</div>
 					  </li>";

 				$i = $i + 1;
 			}

 		 ?>
 	</ul>
 </div>

<?php include("includes/footer.php"); ?>