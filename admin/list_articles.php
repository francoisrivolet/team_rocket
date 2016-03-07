<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/controllers/users.php");
$controller_user= new Controller_User();
$listeUsers = $controller_user->listUser();	
?>


<div class="container-fluid">
	<div class="row">

		<div class="col-sm-12 col-md-6">
			<table border="1">	
				<tr>
					<th>Miniature</th>
					<th>Nom</th>
					<th>Niveau</th>
					<th>Prix</th>
					<th>Stock</th>
					<th>Gestion</th>
				</tr>		
			<?php foreach ($listeArticlesAdmin as $articles) {
				echo '<tr>';
				echo '<td><img src="'.$articles['url_miniature'].'" /></td>';
				echo '<td>'.$articles['nom'].'</td>';
				echo '<td>'.$articles['niveau'].'</td>';
				echo '<td>'.$articles['prix'].'</td>';
				echo '<td>'.$articles['stock'].'</td>';
				echo '<td><a href="index.php?c=article&a=modify&id='.$articles['id_pokemon'].'">Modifier</a></td>';
				echo '</tr>';
			}
			?>
			</table>
		</div>
		<div class="col-sm-12 col-md-6">
			<table border="1">
				<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Email</th>
					<th>Adresse</th>
					<th>Gestion</th>
				</tr>
			<?php 
			foreach ($listeUsers as $users) {
				echo '<tr>';
				echo '<td>'.$users['nom'].'</td>';
				echo '<td>'.$users['prenom'].'</td>';
				echo '<td>'.$users['email'].'</td>';
				echo '<td>'.$users['adresse'].'</td>';
				echo '<td><a href="index.php?c=users&a=modify&id='.$users['id_user'].'">Modifier / Supprimer</a></td>';
				echo '</tr>';
			}
			?>
			</table>
		</div>
	</div>
</div>
