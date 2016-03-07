<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/aside.php"); ?>

<div class="container-fluid">
	<div class="row article__pokemon" >
		<div class="col-sm-12 col-md-12 article__titre">
			<h1>
				<b><?= $articleDetails[0]['nom'] ?>   </b>    Nv.<?= $articleDetails[0]['niveau'] ?>	
				<span class="type <?= $articleTypes[0]['nom']?>">
					<?= $articleTypes[0]['nom'] ?>
				</span> 
				<?php if (isset($articleTypes[1]['nom'])) { ?> <!--Affiche le deuxieme type s'il existe-->
				<span class="type <?= $articleTypes[1]['nom']?>">
					<?=$articleTypes[1]['nom']?>
				</span>
				<?php } ?>			
			</h1>
		</div>
		<div  class="col-sm-12 col-md-6 article__portrait">
			    <img src="<?= $articleImages[0]['url_portrait'] ?>" alt="'<?= $articleDetails[0]['nom'] ?>">
		</div>
		<div class="col-sm-12 col-md-3 article__stats">
			<table>
				<tr>
					<td><b>Points de Vie</b></td>
					<td><?= $articleStats[0]['pv'] ?></td>
				</tr>
				<tr>
					<td><b>Attaque</b></td>
					<td><?= $articleStats[0]['attaque'] ?></td>
				</tr>
				<tr>
					<td><b>Défense</b></td>
					<td><?= $articleStats[0]['defense'] ?></td>
				</tr>
				<tr>
					<td><b>Attaque spéciale</b></td>
					<td><?= $articleStats[0]['attaque_spe'] ?></td>
				</tr>
				<tr>
					<td><b>Défense spéciale</b></td>
					<td><?= $articleStats[0]['defense_spe'] ?></td>
				</tr>
				<tr>
					<td><b>Vitesse</b></td>
					<td><?= $articleStats[0]['vitesse'] ?></td>
				</tr>
			</table>

		</div>
		<div class="col-sm-12 col-md-3 article__achat">
			<div class="article__achat--prix">
		    	<?= $articleDetails[0]['prix'] ?> ₽
		    </div>
            <?php 	
            if ($articleDetails[0]['stock'] == 0){ // différents affichages en fonction des stocks
            	?>
        		<span class="liste_quantite liste_quantite-indisponible">Indisponible</span>
        	<?php }
        	elseif ($articleDetails[0]['stock'] < 10) { ?>
        		<span class="liste_quantite liste_quantite-limite">Quantité limitée !</span>
        		<button class="bouton-achat btn btn-primary">J'achète !</button>
        	<?php }
        	else { ?>
        		<span class="liste_quantite liste_quantite-normal">En stock !</span>
        		<button class="bouton-achat btn btn-primary">J'achète !</button>
        	<?php } ?>		    
		</div>
	</div>
</div>
