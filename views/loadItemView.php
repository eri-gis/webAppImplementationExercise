<?php
class LoadItemView extends twig {
	
		public function show() {
			if (isset($_SESSION['username'])){
            echo self::getTwig()->render('loadItem.html' , array( 'id' => $_SESSION['id'], 'username' => $_SESSION['username']));
		
           }
          

       }

   }
