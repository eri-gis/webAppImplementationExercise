<?php
class IndexView extends twig {
	
		public function show() {
			if (isset($_SESSION['username'])){
            echo self::getTwig()->render('login.html' , array('nombre' => 'Login', 'username' => $_SESSION['username'] , 'id' => $_SESSION['id']));
		
        }
    }
    
}
