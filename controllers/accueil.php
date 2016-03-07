<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/models/accueil.php");
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/models/article.php");

class Controller_Accueil {

	public function starterAccueilArticle() {
		$articles = new Model_Accueil();
		$listeStarters = $articles->starterAccueilArticles();
		require_once($_SERVER['DOCUMENT_ROOT'].'/imie/boutique/views/accueil/accueil.php');
	}

	public function listAccueilArticle() {
		$articles = new Model_Article();
		$listeAccueilArticles = $articles->listArticles();
		return $listeAccueilArticles;
	}

}