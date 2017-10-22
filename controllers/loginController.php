<?php

/** CONTROLADOR DEL LOGIN **/

class LoginController {
	
	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {}

    public function Login(){
        $view = new LoginView();
        $view->show();
    }

	public function Validar($user, $pas){

		$resources = UsuarioDB::getInstance()->get($user, $pas);
        
		if (!empty($resources)){

			  $_SESSION['id'] = $resources[0]->getId();
              $_SESSION['username'] = $resources[0]->getUsername();
              header('Location: ./index.php?action=Listar');
              
              
        } 
			 					 
        
        else{
			  $mensaje="Acceso Incorrecto. Intente nuevamente.";
              $view = new LoginView();
              $view->error($mensaje);
        }
    }

	public function Logout() {
		// Destruir todas las variables de sesión.
		$_SESSION = array();
		session_destroy();
		$view = new LoginView();
		$view->show();
    }

	
}