<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/accueil.php");
$controller_accueil = new Controller_Accueil();
$listeAccueil = $controller_accueil->listAccueilArticle(); 
?>


<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/aside.php"); ?>

<div class="container-fluid">
	<div class="row starter">
		<h1 class="titre__section">Starter Pack : </h1> 
		<h2 class="titre__section--suite">Kit pour Méchants débutants</h2>
		<?php foreach ($listeStarters as $articles): ?>
			<div class="col-xs-12 col-sm-6 col-md-4 starter__article">
		        <div class="">
		                <a href="index.php?c=article&a=view&id=<?= $articles['id_pokemon'] ?>"><img src="<?= $articles['url_portrait'] ?>" alt="<?= $articles['nom'] ?>" ></a>
		            <h3><a href="index.php?c=article&a=view&id=<?= $articles['id_pokemon'] ?>"><?= $articles['nom'] ?></a> <span class="liste__prix"><?= $articles['prix'] ?> ₽</span></h3>
		        </div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row starter">
		<a href="index.php?c=article&a=list">
			<h1 class="titre__section">Nos Pokemons !</h1>
			<h2 class="titre__section--suite">Le meilleur choix de pokémons volés</h2>
		</a>
			<?php foreach ($listeAccueil as $article): ?>
				<div class="col-xs-4 col-sm-4 col-md-2">
					<a href="index.php?c=article&a=view&id=<?= $article['id_pokemon'] ?>"><img src="<?= $article['url_miniature'] ?>" alt="<?= $article['nom'] ?>"></a>
					<a href="index.php?c=article&a=view&id=<?= $article['id_pokemon'] ?>"><p><?= $article['nom']; ?></p></a>
				</div>
			<?php endforeach; ?>
	</div>
</div>

