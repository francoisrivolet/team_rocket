<?php
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/models/article.php");

class Controller_Article {
	/**
	 * Fonctions permettant de lister les articles
	 */
	public function listArticle() {
		$articles = new Model_Article();
		$listeArticles = $articles ->listArticles();
		require_once($_SERVER['DOCUMENT_ROOT'].'/imie/boutique/views/articles/list.php');
	}

	public function listArticleAdmin() {
		$articles = new Model_Article();
		$listeArticlesAdmin = $articles ->listArticles();
		require_once($_SERVER['DOCUMENT_ROOT'].'/imie/boutique/admin/list_articles.php');
	}

	public function listArticlesDetailsByTypes($types) {
		$articles = new Model_Article();
		$articlesByTypes = $articles->articlesDetailsByTypes($types);
		return $articlesByTypes;
	}

	public function viewArticle($id){
		$articles = new Model_Article();
		$articleDetails = $articles->articleDetails($id);
		$articleImages = $articles->articleImages($id);
		$articleTypes = $articles->articleTypes($id);
		$articleStats = $articles->articleStats($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/imie/boutique/views/articles/view.php');
	}

	public function getArticle($id){
		$articles = new Model_Article();
		$articleDetails = $articles->articleDetails($id);
		$articleImages = $articles->articleImages($id);
		$articleTypes = $articles->articleTypes($id);
		$articleStats = $articles->articleStats($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/imie/boutique/admin/article_modify.php');
	}

	public function modifyArticle($id)
	{
		if (!empty($_POST) && isset($_POST['modifyDetails']))
		{
			$nom = htmlspecialchars($_POST['nom']);
			$niveau = htmlspecialchars(intval($_POST['niveau']));
			$prix = htmlspecialchars(floatval($_POST['prix']));
			$stock = htmlspecialchars(intval($_POST['stock']));
			$model_article = new Model_Article();
			$model_article->modifyDetailsArticle($nom,$niveau,$prix,$stock,$id);
			header("Refresh:0");			
		}
		elseif (!empty($_POST) && isset($_POST['modifyImages']))
		{
			$url_portrait = htmlspecialchars($_POST['url_portrait']);
			$url_miniature = htmlspecialchars($_POST['url_miniature']);
			$model_article = new Model_Article();
			$model_article->modifyImagesArticle($url_portrait,$url_miniature,$id);
			header("Refresh:0");
		}
		elseif (!empty($_POST) && isset($_POST['modifyStats']))
		{
			$pv = htmlspecialchars($_POST['pv']);
			$attaque = htmlspecialchars($_POST['attaque']);
			$defense = htmlspecialchars($_POST['defense']);
			$attaque_spe = htmlspecialchars($_POST['attaque_spe']);
			$defense_spe = htmlspecialchars($_POST['defense_spe']);
			$vitesse = htmlspecialchars($_POST['vitesse']);
			$model_article = new Model_Article();
			$model_article->modifyStatsArticle($pv,$attaque,$defense,$attaque_spe,$defense_spe,$vitesse,$id);
			header("Refresh:0");
		}
	}

}

?>