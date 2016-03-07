<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/aside.php");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-3">
			<aside class="aside container-fluid">
				<div class="row">
					<div class="bloc-connexion col-xs-10 col col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-offset-1">
						<?php if(!empty($_SESSION)) {
						 	echo '<p>Bienvenue '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</p>'; //affiche un message si user est connecté
						} else {
						 	echo '<p>Déconnecté</p>'; 
						} 
						?>
						
						<?php // on change le bouton de connexion si l'utilisateur est deja connecté
						if (empty($_SESSION)){?>
							<a href="index.php?c=users&a=connexion">
								<div class="bouton-connexion">
									Connexion
								</div>
							</a>
						<?php }	else { ?>
							<a href="index.php?c=users&a=deconnexion">
								<div class="bouton-connexion">
									Deconnexion
								</div>
							</a>
						<?php } ?>						
					</div>
				</div>
				<div class="row">
					<div class="bloc-recherche col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-offset-1">
						<form name="recherche" method="post">
							<label class="control-labell">Vous recherchez un pokémon ?</label>
							<input class="form-control" type="text" class="form-control" name="recherche" placeholder="nom du pokemon" /><br>
							<input class="btn btn-primary" type="submit" value="Rechercher" name="rechercher"/>
						</form>

						<?php 
						if (!empty($_POST['recherche']) && isset($_POST['rechercher'])){ //isset($_POST['rechercher']) pour eviter les confusions entre deux formulaires.
							$controller_Aside = new Controller_Aside();
							$nom = htmlspecialchars($_POST['recherche']);
							$nom = ucfirst($nom); // fonction pour mettre la premiere lettre en Majuscule.
							$getId = $controller_Aside->getId($nom); // fonction qui cherche l'id en fonction du nom.
							if (sizeof($getId) != 0){
								$id = $getId[0]['id_pokemon'];
								header('location:index.php?c=article&a=view&id='.$id); //on dirige vers la page article avec l'id $id.
								exit;
								}
							else { ?>
								<div class="alerte-recherche alert alert-dismissible alert-warning">
  									<strong>Aucun Pokémon trouvé !</strong> 
							<?php }
						}
						else {
						}?>
					</div>
				</div>

			</aside>
		</div>
		<div class="col-sm-12 col-md-9">
			