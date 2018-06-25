<?php
	
	class Playlist{

		private $conn;
		private $id;
		private $name;
		private $owner;

		public function __construct($conn,$data){
			if(!is_array($data)){
				$query = mysqli_query($conn,"SELECT * FROM playlists WHERE id='$data'");
				$data = mysqli_fetch_array($query);
			}
			$this->conn = $conn;
			$this->id = $data['id'];
			$this->name = $data['name'];
			$this->owner = $data['owner'];
		}

		public function getName(){
			return $this->name;
		}

		public function getId(){
			return $this->id;
		}

		public function getOwner(){
			return $this->owner;
		}

		public function getNumberOfSongs(){
			$query = mysqli_query($this->conn,"SELECT song FROM playlistsongs WHERE playlist='$this->id'");
			return(mysqli_num_rows($query));
		}

		public function getSongIds(){
			$songIdQuery = mysqli_query($this->conn,"SELECT song from playlistsongs WHERE playlist='$this->id' ORDER BY playlistorder ASC");

			$songArray = array();

			while($row = mysqli_fetch_array($songIdQuery)){
				array_push($songArray, $row['song']);
			}

			return $songArray;
		}
	}

?>