<?php

	class myToDoListView extends Twig {
		public function show($items) {
			if (isset($_SESSION['username'])) {
				echo self::getTwig()->render('myToDoList.html', array('items' => $items, 'username' => $_SESSION['username']));
			} else {
				echo self::getTwig()->render('login.html' , array('nombre' => 'Login'));
			}
		}
	}