<?php include("includes/includedFiles.php");?>

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
 							<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"". $albumSong->getId()."\", tempPlayListArray, true)'>
 							<span class='trackNumber'>$i</span>
 						</div>

 						<div class='trackInfo'>
 							<span class='trackName'>".$albumSong->getTitle()."</span>
 							<span class='artistName'>".$albumArtist->getName()."</span>
 						</div>

 						<div class='trackOptions'>
 						<input type='hidden' class='songId' value='".$albumSong->getId()."'>
 							<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
 						</div>

 						<div class='trackDuration'>
 							<span class='duration'>".$albumSong->getDuration()."</span>
 						</div>
 					  </li>";

 				$i = $i + 1;
 			}

 		 ?>

 		 <script type="text/javascript">
 		 	var tempSongIds = '<?php echo json_encode($songIdArray);?>';
 		 	tempPlayListArray = JSON.parse(tempSongIds);
 		 	//console.log(tempPlayListArray);
 		 </script>

 	</ul>
 </div>

 <nav class="optionsMenu">
 	<input type="hidden" class="songId">
 	<?php echo(Playlist::getPlaylistDropDown($conn, $userLoggedIn->getUsername())); ?>
 	<div class="item">Copy song link</div>
 </nav>
