<?php
class LoadItemView extends twig {
	
		public function show($message) {
			if (isset($_SESSION['username'])){
            echo self::getTwig()->render('loadItem.html' , array( 'message' => $message, 'id' => $_SESSION['id'], 'username' => $_SESSION['username']));
		
           }
          

       }

   }
