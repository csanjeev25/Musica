<?php

class Account{

	public $errorArray;
	public $loginErrorArray;
	private $conn;

	public function __construct($conn){	
		$this->errorArray = array();
		$this->loginErrorArray = array();
		$this->conn = $conn;
	}

	public function register($username,$name,$lastName,$email1,$email2,$pass1,$pass2){
		$this->validateUsername($username);
		$this->validateName($name);
		$this->validateLastName($lastName);
		$this->validateEmails($email1,$email2);
		$this->validatePasswords($pass1,$pass2);

		if(empty($this->errorArray) == true){
			//insert to db
			return $this->insertUserDetails($username,$name,$lastName,$email1,$pass1);
		}else{
			return false;
		}
	}

	private function insertUserDetails($un,$fn,$ln,$email,$pass){
		$encryptedPw = md5($pass);
		$profilePic = "assets/images/profile-pics/head_emerald.png";
		$date = date("Y-m-d H:i:s");

		$result = mysqli_query($this->conn,"INSERT INTO users VALUES ('','$un','$fn','$ln','$email','$encryptedPw','$date','$profilePic')");
		return $result;
	}


	public function checkError($error){
		if(!in_array($error, $this->errorArray)){
			$error="";
		}
		return "<span class='errorMessage'>$error</span>";
	}

	private function validateUsername($username){
		if(strlen($username) > 25 || strlen($username) < 5){
			array_push($this->errorArray, Constants::$userNameCharacters);
			return;
		}

		$checkUserNameQuery = mysqli_query($this->conn,"SELECT username FROM users WHERE username='$username'");
		if(mysqli_num_rows($checkUserNameQuery) != 0){
			array_push($this->loginErrorArray, Constants::$userNameTaken);
			return;
		}
	}

	private function validateName($name){
		if(strlen($name) > 25 || strlen($name) < 5){
			array_push($this->errorArray, Constants::$firstNameCharacters);
			return;
		}
	}

	private function validateLastName($name){
		if(strlen($name) > 25 || strlen($name) < 5){
			array_push($this->errorArray, Constants::$lastNameCharacters);
			return;
		}
	}

	private function validateEmails($email1,$email2){
		if($email1 != $email2){
			array_push($this->errorArray, Constants::$emailsDoNotMatch);
			return;
		}

		if(!filter_var($email1,FILTER_VALIDATE_EMAIL)){
			array_push($this->errorArray, Constants::$emailInvalid);
			return;
		}

		$checkEmailQuery = mysqli_query($this->conn,"SELECT email FROM users WHERE email = '$email1'");
		if(mysqli_num_rows($checkEmailQuery) != 0){
			array_push($this->errorArray, Constants::$emailAlreadyRegistered);
			return;
		}
	}

	private function validatePasswords($pass1,$pass2){
		if($pass1 != $pass2){
			array_push($this->errorArray, Constants::$passwordsDoNotMatch);
			return;
		}

		if(preg_match('/[^A-Za-z0-9@]/', $pass1)){
			array_push($this->errorArray, Constants::$passwordsNotAlphaNumeric);
			return;
		}

		if(strlen($pass1) > 25 || strlen($pass1) < 5){
			array_push($this->errorArray, Constants::$passwordCharacter);
			return;
		}
	}

	public function login($username,$password){
		$encryptedPw = md5($password);

		$query = mysqli_query($this->conn,"SELECT * FROM users WHERE username = '$username' AND password = '$encryptedPw'");
		if(mysqli_num_rows($query) == 1){
			return true;
		}else{
			array_push($this->loginErrorArray, Constants::$loginFailed);
			return false;
		}
	}
}

?>
