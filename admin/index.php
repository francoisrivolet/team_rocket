<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/admin/header.php");
$controller = "";
$action ="";

if (!empty($_GET['c']) AND !empty($_GET['a'])){
	$controller = $_GET['c'];
	$action = $_GET['a'];
}

if ($controller == "article" AND $action == "list") {
	require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/article.php");
	$controller_article= new Controller_Article();
	$controller_article->listArticleAdmin();

}

elseif ($controller == "users" AND $action == "modify") {
	if(empty($_GET['id'])){
		echo "<p>Il manque l'identifiant de l'utilisateur</p>";
	}
	else {
		$idUsers = intval($_GET['id']);
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/users.php");
		$controller_users = new Controller_User();
		$user = $controller_users->getUser($idUsers);
		$controller_users->modifyUser($idUsers);
		$controller_users->deleteUser($idUsers);
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/admin/user_modify.php");
	}
}

elseif ($controller == "article" AND $action == "modify") {
	if(empty($_GET['id'])){
		echo "<p>Il manque l'identifiant de l'utilisateur</p>";
	}
	else {
		$idArticle = intval($_GET['id']);
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/article.php");
		$controller_article = new Controller_Article();
		$controller_article->getArticle($idArticle);
		$controller_article->modifyArticle($idArticle);
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/admin/article_modify.php");
	}
}

require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/admin/footer.php");?>