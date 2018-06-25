<?php 
include("includes/includedFiles.php");
?>

<?php
	if(isset($_GET['id'])){
		$playlistId = $_GET['id'];
	}else{
		header("Location: index.php");
	}

	$playlist = new Playlist($conn,$playlistId);

	$owner = new User($conn,$playlist->getOwner()); 

 ?>

 <div class="entityInfo">
 	<div class="leftSection">
 		<div class="playlistImage">
 			<img src="assets/images/icons/playlist.png">
 		</div>
 	</div>
 	<div class="rightSection">
 		<h3><?php echo $playlist->getName(); ?></h3>
 		<p>By <?php echo $playlist->getOwner();?></p>
 		<p><?php echo $playlist->getNumberOfSongs()." songs";?></p>
 		<button class="button green" onclick="deletePlaylist('<?php echo($playlistId); ?>')">DELETE PLAYLIST</button>
 	</div>
 </div>

 <div class="trackListContainer">
 	<ul class="trackList">
 		<?php
 			$i=1;
 			$songIdArray = $playlist->getSongIds();

 			foreach ($songIdArray as $songId) {
 				$playlistSong = new Song($conn,$songId);
 				$songArtist = $playlistSong->getArtist();

 				echo "<li class='trackListRow'>
 						<div class='trackCount'>
 							<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"". $playlistSong->getId()."\", tempPlayListArray, true)'>
 							<span class='trackNumber'>$i</span>
 						</div>

 						<div class='trackInfo'>
 							<span class='trackName'>".$playlistSong->getTitle()."</span>
 							<span class='artistName'>".$songArtist->getName()."</span>
 						</div>

 						<div class='trackOptions'>
 							<img class='optionsButton' src='assets/images/icons/more.png'>
 						</div>

 						<div class='trackDuration'>
 							<span class='duration'>".$playlistSong->getDuration()."</span>
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
