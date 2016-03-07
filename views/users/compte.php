<?php if(!empty($_SESSION['id_user'])){ //on affiche la page seulement si l'user est connecté sinon on le redirige vers la connexion
	?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/aside.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<form class="form-horizontal" method="post">
		    	<h1 id="connexion-titre">Modifier mes informations</h1>
		    	<div class="form-group">
		      		<label for="inputLastName" class="col-xs-2 control-label">Nom</label>
		      		<div class="col-sm-10 col-md-6 ">
		        		<input type="text" class="form-control" id="inputLastName" name="nom" value="<?= $user[0]['nom']; ?>">
					</div>
			    </div>
			    <div class="form-group">
			      	<label for="inputFirstName" class="col-xs-2 control-label">Prénom</label>
			      	<div class="col-sm-10 col-md-6">
			        	<input type="text" class="form-control" id="inputFirstName" name="prenom" value="<?= $user[0]['prenom']; ?>">
			        </div>
			    </div>
			    <div class="form-group">
			      	<label for="inputEmail" class="col-xs-2 control-label">Email</label>
			      	<div class="col-sm-10 col-md-6">
			        	<input type="text" class="form-control" id="inputEmail" name="email" value="<?= $user[0]['email']; ?>">
			        </div>
			    </div>
			    <div class="form-group">
				    <label for="textArea" class="col-lg-2 control-label">Adresse</label>
				    <div class="col-sm-10 col-md-6">
				        <textarea class="form-control" rows="4" name="adresse" id="textAdress" value="<?= $user[0]['adresse']; ?>"><?= $user[0]['adresse']; ?>
				        </textarea>
				    </div>
				</div>
			    <div class="form-group">
				    <div class="col-md-10 col-md-offset-2">
				        <input class="btn btn-primary" type="submit" name="modify" value="Modifier" />
			      	</div>
			    </div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
