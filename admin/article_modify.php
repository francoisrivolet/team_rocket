<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<fieldset>
				<h2>Modification</h2>
				<h3>Informations :</h3>
				<form method="post">
					<label>Details</label><br>
					<input type="text" name="nom" value="<?= $articleDetails[0]['nom'] ?>"  /><br>
					<input type="text" name="niveau" value="<?= $articleDetails[0]['niveau'] ?>" /><br>
					<input type="text" name="prix" value="<?= $articleDetails[0]['prix'] ?>" /><br>
					<input type="text" name="stock" value="<?= $articleDetails[0]['stock'] ?>" /><br>
					<input type="submit" name="modifyDetails" value="Modifier" />
				</form>
				<form method="post">
					<label>Images</label><br>
					<input type="text" name="url_portrait" value="<?= $articleImages[0]['url_portrait'] ?>"  /><br>
					<input type="text" name="url_miniature" value="<?= $articleImages[0]['url_miniature'] ?>"  /><br>
					<input type="submit" name="modifyImages" value="Modifier" />
				</form>
				<form method="post">
					<label>Stats</label><br>
					<input type="text" name="pv" value="<?= $articleStats[0]['pv'] ?>"  /><br>
					<input type="text" name="attaque" value="<?= $articleStats[0]['attaque'] ?>"  /><br>
					<input type="text" name="defense" value="<?= $articleStats[0]['defense'] ?>"  /><br>
					<input type="text" name="attaque_spe" value="<?= $articleStats[0]['attaque_spe'] ?>"  /><br>
					<input type="text" name="defense_spe" value="<?= $articleStats[0]['defense_spe'] ?>"  /><br>
					<input type="text" name="vitesse" value="<?= $articleStats[0]['vitesse'] ?>"  /><br>
					<input type="submit" name="modifyStats" value="Modifier" />
				</form>
			</fieldset>
		</div>
	</div>
</div>