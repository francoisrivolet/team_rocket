<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/header.php");

$controller = "";
$action ="";

if (!empty($_GET['c']) AND !empty($_GET['a'])){
	$controller = $_GET['c'];
	$action = $_GET['a'];
}

if ($controller == "article" AND $action == "list") {
	if(empty($_GET['t'])){
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/article.php");
		$controller_article= new Controller_Article();
		$controller_article->listArticle();
	}
	else {
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/article.php");
		$types = ucfirst($_GET['t']);
		$controller_article = new Controller_Article();
		$detailsByTypes = $controller_article->listArticlesDetailsByTypes($types);
		require_once($_SERVER['DOCUMENT_ROOT'].'/imie/boutique/views/articles/list_types.php');
	}
}

elseif ($controller == "article" AND $action == "view") {
	if(empty($_GET['id'])){
		echo "<p>Il manque l'identifiant du produit</p>";
	}
	else {
		$idProduit = intval($_GET['id']);
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/article.php");
		$controller_article = new Controller_Article();
		$details = $controller_article->viewArticle($idProduit);
	}
}

elseif ($controller == "users" AND $action == "connexion"){
	require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/users.php");
	$controller_users = new Controller_User();
	$controller_users->connexion();
}

elseif ($controller == "users" AND $action == "deconnexion"){
	require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/users.php");
	$controller_users = new Controller_User();
	$controller_users->deconnexion();
}

elseif ($controller == "users" AND $action == "modify"){
	require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/users.php");
	$controller_users = new Controller_User();
	if (isset($_SESSION['id_user'])){
		$user = $controller_users->getUser(intval($_SESSION['id_user']));
		$controller_users->modifyUser(intval($_SESSION['id_user']));
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/users/compte.php");
	}
	else {
	header('Location: index.php?c=users&a=connexion');
	}	
}

elseif ($controller == "users" AND $action == "inscription"){
	require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/users.php");
	$controller_users = new Controller_User();
	$controller_users->AddUser();
}

elseif ($controller == "" AND $action == ""){
	// le code pour traiter la page d'accueil
	require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/accueil.php");
	$controller_accueil = new Controller_Accueil();
	$controller_accueil->listAccueilArticle();
	$controller_accueil->starterAccueilArticle();

}


require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/footer.php"); ?>