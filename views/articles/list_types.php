<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/aside.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-12 titre_type">
			<h1 class="type-titre <?= $types ?> "><?= $types ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="liste-totale">
			<?php foreach ($detailsByTypes as $articles) :?><!--on fait une boucle pour afficher une liste de pokemons-->
				<div class="col-xs-8 col-xs-offset-2 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-0 col-lg-4 col-lg-offset-0">
			        <div class="pokemon">
			            <div class="article_pokemon">
			                <a href="index.php?c=article&a=view&id=<?= $articles['id_pokemon'] ?>"><img src="<?= $articles['url_portrait'] ?>" alt="'<?= $articles['nom'] ?>"></a>
			            </div>
			            <h3><a href="index.php?c=article&a=view&id=<?= $articles['id_pokemon'] ?>"><?= $articles['nom'] ?> <span class="liste__prix"><?= $articles['prix'] ?> ₽</span></a></h3>
			            <?php 	
			            if ($articles['stock'] == 0){ ?>
	                		<span class="liste_quantite liste_quantite-indisponible">Indisponible</span><!--Affichage du stock-->
	                	<?php }
	                	elseif ($articles['stock'] < 10) { ?>
	                		<span class="liste_quantite liste_quantite-limite">Quantité limitée !</span>
	                	<?php }
	                	else { ?>
	                		<span class="liste_quantite liste_quantite-normal">En stock !</span>
	                	<?php } ?>
			        </div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>