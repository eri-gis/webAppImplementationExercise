<?php
class EditItemView extends twig {
	
		public function show($item, $message) {
			if (isset($_SESSION['username'])){
            echo self::getTwig()->render('editItem.html' , array('item' => $item, 'message' => $message, 'id' => $_SESSION['id'], 'username' => $_SESSION['username']));
		
           }
          

       }

   }

