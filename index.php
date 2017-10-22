<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

/** CONTROLADORES **/


require_once './controllers/loginController.php';
require_once './controllers/todolistController.php';


/** CLASES MODELO**/

require_once './model/clases/usuario.php';
require_once './model/clases/item.php';


/** MODELO CONSULTAS**/

require_once './model/db/modelDB.php';
require_once './model/db/usuarioDB.php';
require_once './model/db/todolistDB.php';


/** VISTAS **/

include_once './views/twig.php';
require_once './views/loginView.php';
require_once './views/myToDoListView.php';
require_once './views/LoadItemView.php';
require_once './views/EditItemView.php';


session_start();

if (isset($_GET["action"]) && $_GET["action"] == 'Login'){
    LoginController::getInstance()->Login();
}

elseif (isset($_GET["action"]) && $_GET["action"] == 'Logout'){
    LoginController::getInstance()->Logout();
}

elseif (isset($_GET["action"]) && $_GET["action"] == 'Validar'){
	$usuario=filter_input(INPUT_POST, "user");
	$password=filter_input(INPUT_POST, "password");
    LoginController::getInstance()->Validar($usuario,$password);
}

elseif (isset($_GET["action"]) && $_GET["action"] == 'Listar'){
    ToDoListController::getInstance()->Listar();
}

elseif (isset($_GET["action"]) && $_GET["action"] == 'NewItem'){
    ToDolistController::getInstance()->NewItem();
}

elseif (isset($_GET["action"]) && $_GET["action"] == 'LoadItem'){
    ToDolistController::getInstance()->LoadItem();
}

elseif (isset($_GET["action"]) && $_GET["action"] == 'EditItem'){
    ToDolistController::getInstance()->EditItem();
}

elseif (isset($_GET["action"]) && $_GET["action"] == 'UpdateItem'){
    ToDolistController::getInstance()->UpdateItem();
}


elseif (isset($_GET["action"]) && $_GET["action"] == 'DeleteItem'){
    ToDolistController::getInstance()->DeleteItem();
}

else{

    LoginController::getInstance()->Login();
}
