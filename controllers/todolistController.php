<?php

/** CONTROLADOR DE LISTAS **/

class ToDoListController {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {}

    /** Listado de Items  **/

    public function Listar($message=NULL) {

        $id = $_SESSION['id'];
        $items_db = ToDoListDB::getInstance();
        $items =$items_db->getAllItems($id);
        $view = new myToDoListView();
        $view->show($items);
    }


    public function NewItem($message=NULL) {

        $id = $_SESSION['id'];
    	$view = new LoadItemView();
        $view->show($message);

     }

     public function LoadItem() {

    	if (($_POST['title']!="") && ($_POST['due_date']!="") && ($_POST['description']!="")) {

            $title = htmlentities($_POST['title']);
            $due_date = htmlentities($_POST['due_date']);
            $description = htmlentities($_POST['description']);
            if ($_POST['done']!=""){

                  $done = htmlentities($_POST['done']);   
            }
            else{

                $done = 0;
            }           
            $user_id = $_SESSION['id'];
            $new_item = ToDoListDB::getInstance()->nuevoItem($title, $due_date, $description, $done, $user_id);

            $this->Listar($message=NULL);

        }
        else{

        	$this->NewItem("completar todos los campos");
        }

     }


     public function EditItem($message=NULL) {

        $id_item = $_GET['itemId'];
        $item = ToDoListDB::getInstance()->obtenerItem($id_item);
        $view = new EditItemView();
        $view->show($item, $message);

        
     }

     public function UpdateItem($message=NULL) {

        $id = $_GET['itemId'];
        if (($_POST['title']!="") && ($_POST['due_date']!="") && ($_POST['description']!="")) {

            $title = htmlentities($_POST['title']);
            $due_date = htmlentities($_POST['due_date']);
            $description = htmlentities($_POST['description']);
            
            if (isset($_POST['done'])){

                  $done = 1;   
            }
            else{

                $done = 0;
            }           
            
            $new_item = ToDoListDB::getInstance()->update($id, $title, $due_date, $description, $done);

            $this->Listar($message=NULL);
       }
       else{

            $this->EditItem("completar todos los campos");
        }
        
     }



     public function DeleteItem() {

        $id_item = $_GET['itemId'];
        $items_db = ToDoListDB::getInstance()->delete($id_item);
        $this->Listar("La tarea fue eliminada con exito");
        
        
     }



}