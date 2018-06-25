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
	}

?>