<?php

/**
* MODELO TO-DO-LIST BASE DE DATOS
*/

class ToDoListDB extends ModelDB {
	
	private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct() {

    }

    public function getAllItems($id) {

        $mapper = function($row){
                 $resource = new Item($row['id'], $row['title'] ,$row['due_date'], $row['description'], $row['done'], $row['user_id']);
                     return $resource;
                 };
 
        $query = "SELECT  id, title, due_date, description, done, user_id 
                FROM my_to_do_list  
                WHERE user_id = ?";

        $answer = $this->queryList($query, [$id], $mapper);
        return $answer;
    }

    public function obtenerItem($id_item) {

        $mapper = function($row){
                 $resource = new Item($row['id'], $row['title'] ,$row['due_date'], $row['description'], $row['done'], $row['user_id']);
                     return $resource;
                 };

        $query = "SELECT  id, title, due_date, description, done, user_id 
                FROM my_to_do_list  
                WHERE id = ?";

         $answer = $this->queryList($query, [$id_item], $mapper);         

        return $answer[0];
        
    }


    public function nuevoItem($title, $due_date, $description, $done, $user_id){

        $connection = $this->open_connection();
        $stmt = $connection->prepare('INSERT INTO my_to_do_list ( title, due_date, description, done, user_id)
                            VALUES (:title, :due_date, :description, :done, :user_id)');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR, 45);
        $stmt->bindParam(':due_date', $due_date, PDO::PARAM_STR, 45);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR, 50);
        $stmt->bindParam(':done', $done, PDO::PARAM_INT, 50);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT, 50);
        
        return $stmt->execute();


     }

     public function update($id, $title, $due_date, $description, $done){

        $connection = $this->open_connection();

        $stmt = $connection->prepare('UPDATE  my_to_do_list SET title = :title,
                                                             due_date = :due_date, 
                                                          description = :description,
                                                                 done = :done
                                                                  WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR, 45);                   
        $stmt->bindParam(':title', $title, PDO::PARAM_STR, 45);
        $stmt->bindParam(':due_date', $due_date, PDO::PARAM_STR, 45);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR, 50);
        $stmt->bindParam(':done', $done, PDO::PARAM_INT, 50);
        
           
        return $stmt->execute();


     }

     public function delete($id_item) {

        $connection = $this->open_connection();
        $stmt = $connection->prepare('DELETE FROM my_to_do_list WHERE id = :id_item');
        $stmt->bindParam(':id_item', $id_item, PDO::PARAM_INT, 11);
        return $stmt->execute();


    }
}
