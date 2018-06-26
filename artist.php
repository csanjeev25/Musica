<?php

include("includes/includedFiles.php");

if(isset($_GET['id'])){
	$artistId = $_GET['id'];
}else{
	header("Location: index.php");
}

$artist = new Artist($conn,$artistId);


?>

<div class="entityInfo">
	<div class="centerSection borderBottom">
		<div class="artistInfo">
			<h1 class="artistName"><?php echo $artist->getName();?></h1>
			<div class="headerButtons">
				<button class="button green" onclick="playArtistSongs()">PLAY</button>
			</div>
		</div>
	</div>
</div>

<div class="trackListContainer borderBottom">
	<h2>SONGS</h2>
 	<ul class="trackList">
 		<?php
 			$i=1;
 			$songIdArray = $artist->getSongIds();

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

 <div class="gridViewContainer">
 	<h2>ALBUMS</h2>
	<?php
		$albumQuery = mysqli_query($conn,"SELECT * FROM albums WHERE artist='$artistId'");
		while ($row = mysqli_fetch_array($albumQuery)) {
			echo "<div class='gridViewItem'>
						<span role='link' tabindex='0' onclick='openPage(\"album.php?id=".$row['id'] . "\")'>
							<img class='gridViewImage' src='". $row['artworkPath']."'>
							<div class='gridViewInfo'>"
								.$row['title'].
							"</div>
						</span>
				  </div>";
		}
	 ?>
</div>	 

<nav class="optionsMenu">
 	<input type="hidden" class="songId">
 	<?php echo(Playlist::getPlaylistDropDown($conn, $userLoggedIn->getUsername())); ?>
 	<div class="item">Copy song link</div>
 </nav>
