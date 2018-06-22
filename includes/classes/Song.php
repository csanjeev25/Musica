<?php
	
	class Song{

		private $conn;
		private $id;
		private $title;
		private $songData;
		private $artistId;
		private $albumId;
		private $genreId;
		private $duration;
		private $path;
		private $albumOrder;
		private $plays;

		public function __construct($conn,$id){
			$this->conn = $conn;
			$this->id = $id;

			$songQuery = mysqli_query($this->conn,"SELECT * FROM songs WHERE id='$this->id'");
			$this->songData = mysqli_fetch_array($songQuery); 

			$this->title = $this->songData['title'];
			$this->artistId = $this->songData['artist'];
			$this->albumId = $this->songData['album'];
			$this->genreId = $this->songData['genre'];
			$this->duration = $this->songData['duration'];
			$this->path = $this->songData['path'];
			$this->albumOrder = $this->songData['albumOrder'];
			$this->plays = $this->songData['plays'];
	}

	public function getTitle(){
		return $this->title;
	}

	public function getDuration(){
		return $this->duration;
	}


	public function getPath(){
		return $this->path;
	}


	public function getArtist(){
		return new Artist($this->conn,$this->artistId);
	}

	public function getAlbum(){
		return new Album($this->conn,$this->albumId);
	}

	public function getGenre(){
		$genreQuery = mysqli_query($this->conn,"SELECT name FROM genres WHERE id='$this->genreId'");
		$genre = mysqli_fetch_array($genreQuery);

		return $genre['name'];
	}

?>