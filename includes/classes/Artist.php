<?php
	
	class Artist{

		private $conn;
		private $id;
		private $name;

		public function __construct($conn,$id){
			$this->conn = $conn;
			$this->id = $id;
		}

		public function getName(){
			$artistQuery = mysqli_query($this->conn,"SELECT name FROM artists WHERE id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery);
			return $artist['name'];
		}

		public function getSongIds(){
			$songIdQuery = mysqli_query($this->conn,"SELECT id from songs WHERE artist='$this->id' ORDER BY plays DESC");

			$songArray = array();

			while($row = mysqli_fetch_array($songIdQuery)){
				array_push($songArray, $row['id']);
			}

			return $songArray;
		}
	}

?>