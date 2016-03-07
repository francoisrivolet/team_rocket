<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/aside.php"); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="titre__section">Liste complete</h1>
		<div class="liste-totale">
			<?php foreach ($listeArticles as $articles): ?><!--boucle pour effectuer une liste-->
				<div class="col-xs-8 col-xs-offset-2 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
			        <div class="pokemon">
			            <div class="article_pokemon">
			                <a href="index.php?c=article&a=view&id=<?= $articles['id_pokemon'] ?>"><img src="<?= $articles['url_portrait'] ?>" alt="'<?= $articles['nom'] ?>"></a>
			            </div>
			            <h3><a href="index.php?c=article&a=view&id=<?= $articles['id_pokemon'] ?>"><?= $articles['nom'] ?> <span class="liste__prix"><?= $articles['prix'] ?> ₽</span></a></h3>
			            <?php 	
			            if ($articles['stock'] == 0){ ?>
	                		<span class="liste_quantite liste_quantite-indisponible">Indisponible</span><!--affichage en fonction du stock-->
	                	<?php }
	                	elseif ($articles['stock'] < 10) { ?>
	                		<span class="liste_quantite liste_quantite-limite">Quantité limitée !</span>
	                	<?php }
	                	else { ?>
	                		<span class="liste_quantite liste_quantite-normal">En stock !</span>
	                	<?php } ?>
			        </div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>