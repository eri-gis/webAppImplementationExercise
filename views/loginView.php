<?php
class LoginView extends twig {
	
		public function show() {
			if (!isset($_SESSION['username'])){
            echo self::getTwig()->render('login.html' , array('nombre' => 'Login'));
		
           }
          

       }

       public function error($mensaje) { 

           echo self::getTwig()->render('login.html' ,array('nombre' => 'Login', 'mensaje' => $mensaje) );
        }    
    
}
