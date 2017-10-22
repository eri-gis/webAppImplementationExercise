<?php
	

	define("USERNAME", "root");
	define("PASSWORD", "");
	define("HOST", "localhost");
	define("DB", "web_exercise");

abstract class ModelDB {

    public $conection;
	

	public function __construct(){}
	

    //Conectar con la base
	public function open_connection() {

		try {
		    $connection = new PDO("mysql:host=" . HOST . ";dbname=web_exercise", USERNAME, PASSWORD);
		    return $connection;
		} catch (PDOException $e) {
		    $message =  "<pre>¡Error intentando conectar a la BD!: " . $e->getMessage() . "</pre>";
		    die($message);
		}
	}
	
		

    protected function queryList($sql, $args, $mapper){
        $connection = $this->open_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $list = [];
        while($element = $stmt->fetch()){
            $list[] = $mapper($element);
        }
        return $list;
    }
    




	// Desconectar la base de datos
	protected function close_connection() {
		$this->conn = null;
	}
}