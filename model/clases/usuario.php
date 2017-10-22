<?php

/**
* MODELO USUARIO
*/
class Usuario {

	public $id;
	public $username;
	public $password;
	
	function __construct($id, $username, $password) {

		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		
	}

	/**
	* Getters
	*/

	public function getId() {
		return $this->id;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}

}