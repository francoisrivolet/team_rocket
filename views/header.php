<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="images/balls/Master-Ball.ico" />
	<title>Rocket Team Market</title>
	<!--<link rel="stylesheet" type="text/css" href="/imie/boutique/assets/css/bootstrap.css">-->
	<link rel="stylesheet" type="text/css" href="/imie/boutique/assets/cosmo-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="views/stylecss.css">
	
</head>

<body>
<div id="haut-page" class="bloc-principal">
<header class="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1><img src="images/header_logo.png"></h1>
				<h3>Pour les meilleurs mauvais tours !</h3>
			</div>
			<div id="barre_navigation" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="container-fluid">				
				<ul id="menu-deroulant" class="row">
					<li class="col-xs-3 col-md-2 col-md-offset-2">
						<a href="index.php"><img src="images/balls/poke-ball.ico" title="Pokeball" width="20">Accueil</a>
					</li>
					<li class="col-xs-3 col-md-2"><a href="index.php?c=article&a=list"><img src="images/balls/great-ball.ico" title="Pokeball" width="20">Pokemons</a>
						<div class="container row">
						<ul id="deroulant" class="col-xs-10 ">
							<li><a href="index.php?c=article&a=list&t=combat">Combat</a></li>
							<li><a href="index.php?c=article&a=list&t=dragon">Dragon</a></li>
							<li><a href="index.php?c=article&a=list&t=eau">Eau</a></li>
							<li><a href="index.php?c=article&a=list&t=electrik">Electrik</a></li>
							<li><a href="index.php?c=article&a=list&t=feu">Feu</a></li>
							<li><a href="index.php?c=article&a=list&t=glace">Glace</a></li>
							<li><a href="index.php?c=article&a=list&t=insecte">Insecte</a></li>
							<li><a href="index.php?c=article&a=list&t=normal">Normal</a></li>
							<li><a href="index.php?c=article&a=list&t=plante">Plante</a></li>
							<li><a href="index.php?c=article&a=list&t=poison">Poison</a></li>
							<li><a href="index.php?c=article&a=list&t=psy">Psy</a></li>
							<li><a href="index.php?c=article&a=list&t=roche">Roche</a></li>
							<li><a href="index.php?c=article&a=list&t=sol">Sol</a></li>
							<li><a href="index.php?c=article&a=list&t=spectre">Spectre</a></li>
							<li><a href="index.php?c=article&a=list&t=vol">Vol</a></li>
						</ul>
						</div>
					</li>
					<li class="col-xs-3 col-md-2">
						<?php if (empty($_SESSION)){ ?>
							<a href="index.php?c=users&a=connexion"><img src="images/balls/ultra-ball.ico" title="Pokeball" width="20">Mon compte</a>
						<?php } else {
								if ($_SESSION['id_user'] == 1) { ?>
									<a href="admin/index.php?c=article&a=list"><img src="images/balls/ultra-ball.ico" title="Pokeball" width="20">Administration</a>
						<?php } else { ?>
									<a href="index.php?c=users&a=modify"><img src="images/balls/ultra-ball.ico" title="Pokeball" width="20">Mon compte</a>
						<?php }} ?>
					</li>
					<li class="col-xs-3 col-md-2">
						<?php	if (empty($_SESSION)) {?>
							<a href="index.php?c=users&a=connexion"><img src="images/balls/master-ball.ico" title="Pokeball" width="20">Panier</a>
						<?php }	else { ?>
							<a href=""><img src="images/balls/master-ball.ico" title="Pokeball" width="20">Panier</a>
						<?php } ?>	
					</li>								
				</ul>
				</div>							
     		</div>	     	
		</div>
	</div>
</header>
