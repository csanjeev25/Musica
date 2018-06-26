<?php
	
	class User{

		private $conn;

		public function __construct($conn,$username){
			$this->conn = $conn;
			$this->username = $username;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getName(){
			$query = mysqli_query($this->conn,"SELECT concat(firstname,' ',lastname) AS 'name' FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			return $row['name'];
		}
	}

?>