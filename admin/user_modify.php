

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<fieldset>
				<h2>Modification</h2>
				<h3>Informations :</h3>
				<form method="post">
					<label>Nom :</label><br>
					<input type="text" name="nom" value="<?= $user[0]['nom']; ?>"  /><br>
					<label>Prénom :</label><br>
					<input type="text" name="prenom" value="<?= $user[0]['prenom']; ?>" /><br>
					<label>Adresse email :</label><br>
					<input type="email" name="email" value="<?= $user[0]['email']; ?>" /><br>
					<label>Adresse :</label><br>
					<textarea type="text" name="adresse" value="<?= $user[0]['adresse']; ?>" ><?= $user[0]['adresse']; ?></textarea><br>
					<input type="submit" name="modify" value="Modifier" />
					<input type="submit" name="delete" value="Supprimer" />
				</form>
			</fieldset>
		</div>
	</div>
</div>