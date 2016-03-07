<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/aside.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12">
		<?php if ($isInscrit == false) { //si l'utilisateur n'est pas inscrit on affiche le formulaire
			?>
			<form class="form-horizontal" method="post">
		    	<h1 id="connexion-titre">Inscription</h1>
		    	<div class="form-group">
		      		<label for="inputLastName" class="col-xs-2 control-label">Nom</label>
		      		<div class="col-sm-10 col-md-6 ">
		        		<input type="text" class="form-control" id="inputLastName" name="nom" placeholder="Nom">
					</div>
			    </div>
			    <div class="form-group">
			      	<label for="inputFirstName" class="col-xs-2 control-label">Prénom</label>
			      	<div class="col-sm-10 col-md-6">
			        	<input type="text" class="form-control" id="inputFirstName" name="prenom" placeholder="Prénom">
			        </div>
			    </div>
			    <div class="form-group">
			      	<label for="inputEmail" class="col-xs-2 control-label">Email</label>
			      	<div class="col-sm-10 col-md-6">
			        	<input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email">
			        </div>
			    </div>
			    <div class="form-group">
			      	<label for="inputPassword" class="col-xs-2 control-label">Password</label>
			      	<div class="col-sm-10 col-md-6">
			        	<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
			        </div>
			    </div>
			    <div class="form-group">
				    <label for="textArea" class="col-lg-2 control-label">Adresse</label>
				    <div class="col-sm-10 col-md-6">
				        <textarea class="form-control" rows="4" name="adresse" id="textAdress" placeholder="Votre adresse">

				        </textarea>
				    </div>
				</div>
			    <div class="form-group">
				    <div class="col-md-10 col-md-offset-2">
				        <input class="btn btn-primary" type="submit" name="inscription" value="Inscription" />
			      	</div>
			    </div>
			</form>
		<?php } 
		elseif (empty($_SESSION['id_user']) AND $isInscrit == true) { // si l'inscription reussie mais qu'il n'ya pas de session encore on le dirige vers la page connexion
			?>
			<div class="alert alert-dismissible alert-success">
  				<strong>Inscription réussie !</strong> Vous pouvez maintenant vous <a href="index.php?c=users&a=connexion" class="alert-link">connecter</a>.
			</div>
		<?php }
		else { ?>
			<div class="alert alert-dismissible alert-warning">
  				<strong>Vous êtes déja inscrit !</strong> Retourner à<a href="index.php?c=users&a=connexion" class="alert-link">l'accueil</a> ?
			</div>
		<?php }	?>
		</div>
	</div>
</div>