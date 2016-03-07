<?php
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/models/users.php");

class Controller_User 
{

	//recupere les données post lors de l'inscription et les rentre dans la bdd
	public function AddUser()
	{
		$isInscrit = false; // utilisé dans l'affichage de la page inscription
		if(!empty($_POST) && isset($_POST['inscription']))
		{
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$email = htmlspecialchars($_POST['email']);
			$password = sha1($_POST['password']);
			$adresse = htmlspecialchars($_POST['adresse']);
			$model_user = new Model_Users();
			$model_user->AddUser($nom,$prenom,$email,$password,$adresse);
			$isInscrit = true;			
		}
		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/users/inscription.php");
	}

	// supprime l'user avec l'id $id
	public function deleteUser($id) {

		if (isset($_POST['delete'])){
			$model_user = new Model_Users();
			$model_user->deleteUser($id);
			header('Location: index.php');
		}
	}

	// update la base de donnée par les valeur en POST de l'user $id
	public function modifyUser($id)
	{
		if(!empty($_POST) && isset($_POST['modify']))
		{
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$email = htmlspecialchars($_POST['email']);
			$adresse = htmlspecialchars($_POST['adresse']);
			$model_user = new Model_Users();
			$model_user->modifyUser($nom,$prenom,$email,$adresse,$id);
			header("Refresh:0");			
		}
	}

	// recupere les info d'un user par l'$id
	public function getUser($id)
	{
		$users = new Model_Users();
		$user = $users->getUser($id);
		return $user;
	}

	// gere la connexion 
	public function connexion(){

		if(!empty($_POST) AND isset($_POST['connexion'])){
			$email = htmlspecialchars($_POST['email']);
			$password = sha1($_POST['password']);
			if ($email == 'toto@toto' AND $password == sha1('toto')){ // verifie si la connexion est faite avec les identifiants du compte admin
				$admin = new Model_Users();
				$isConnect = $admin->connexions($email,$password);
				if(!empty($isConnect)) {
					$_SESSION['email'] = $isConnect[0]['email'];
					$_SESSION['id_user'] = $isConnect[0]['id_user'];
					$_SESSION['nom'] = $isConnect[0]['nom'];
					$_SESSION['prenom'] = $isConnect[0]['prenom'];
					$_SESSION['adresse'] = $isConnect[0]['adresse'];
					header('Location: admin/index.php?c=article&a=list');
				} else {
					echo 'ERROR! admin';
				}
			}
			else { // sinon verifie que l'user est dans la bdd
				$users = new Model_Users();
				$isConnect = $users->connexions($email,$password);
				if(!empty($isConnect)) {
					$_SESSION['email'] = $isConnect[0]['email'];
					$_SESSION['id_user'] = $isConnect[0]['id_user'];
					$_SESSION['nom'] = $isConnect[0]['nom'];
					$_SESSION['prenom'] = $isConnect[0]['prenom'];
					$_SESSION['adresse'] = $isConnect[0]['adresse'];
					header('Location: index.php');
				} else {
					echo '<div class="alert alert-dismissible alert-danger">';
  					echo '<strong>Erreur !</strong> L\'adresse email ou le mot de passe n\'est pas correct';
					echo '</div>';
				}
			}
		}

   		require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/users/connexion.php");
	}

	// deconnexion
	public function deconnexion() {
		session_destroy();
		header('Location: index.php');
	}

	// permet de créer une liste d'user pour la gestion admin
	public function listUser() {
		$users = new Model_Users();
		$listeUsers = $users->listUsers();
		require_once($_SERVER['DOCUMENT_ROOT'].'/imie/boutique/admin/list_articles.php');
		return $listeUsers;
	}
}