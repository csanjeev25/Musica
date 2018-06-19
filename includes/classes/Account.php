<?php

/**
 * 
 */
class Account{

	private $errorArray;

	public function __construct(){	
		$this->errorArray = array();
	}

	public function register($username,$name,$lastName,$email1,$email2,$pass1,$pass2){
		$this->validateUsername($username);
		$this->validateName($name);
		$this->validateLastName($lastName);
		$this->validateEmails($email1,$email2);
		$this->validatePasswords($pass1,$pass2);

		if(empty($this->errorArray) == true){
			//insert to db
			return true;
		}else{
			return false;
		}
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
}

?>
