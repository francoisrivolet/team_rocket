<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/models/aside.php");

class Controller_Aside {

	public function getId($nom) {
		$articles = new Model_Aside();
		$getId = $articles->getIds($nom);
		return $getId;
	}
}