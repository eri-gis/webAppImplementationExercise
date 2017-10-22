<?php

/**
* MODELO DE ITEM
*/
class Item {

	public $id;
	public $title;
	public $due_date;
	public $description;
	public $done;
	public $user_id;
	
	function __construct($id, $title, $due_date, $description, $done, $user_id ) {

		$this->id = $id;
		$this->title = $title;
		$this->due_date = $due_date;
		$this->description = $description;
		$this->done = $done;
		$this->user_id = $user_id;
		

	}

	/**
	* Getters
	*/

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getDue_Date() {
		return $this->due_date;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getDone() {
		return $this->done;
	}

	public function getUser_Id() {
		return $this->user_id;
	}

}