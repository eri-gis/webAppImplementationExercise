<?php

/**
* MODELO USUARIO BASE DE DATOS
*/

class UsuarioDB extends ModelDB {
	
	private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct() {

    }

	public function get($user, $pass) {

        $mapper = function($row){
            $resource = new Usuario($row['id'], $row['username'], $row['password'] );
            return $resource;
        };

        $answer = $this->queryList(
            "select  id , username, password
             from usuario
             where username = ? AND password = ?  ",
        [$user,$pass], $mapper);

        return $answer;
        
    }
}