<?php
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/models/admin.php");

class Controller_Admin
{
	public function connexion(){

			if(!empty($_POST)){
				$email = htmlspecialchars($_POST['email']);
				$password = htmlspecialchars($_POST['password']);
				$admin = new Model_Admin();
				$isConnect = $admin->connexions($email,$password);
				if (isset($isConnect)){
					echo '<p>Connexion !</p>';
				}
				else{
					echo '<p>Erreur !</p>';
				}
			}
	   		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/admin/connexion.php");
		}

}