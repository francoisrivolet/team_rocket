<?php
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/library/db.php");

class Model_Users {
	private $db;

	public function __construct(){
		$this->db = DB::getInstance();
	}

	//créer un nouvel user, utilisé pour l'inscription
	public function AddUser($nom,$prenom,$email,$password,$adresse){
		$requete = "INSERT INTO users (nom,prenom,email,password,adresse) VALUES (:nom,:prenom,:email,:password,:adresse);";
		$tableau = array(
		'nom' => $nom,
		'prenom' => $prenom,
		'email' => $email,
		'password' => $password,
		'adresse' => $adresse 
		);
		$this->db->execute($requete,$tableau);
	}

	//supprime un user, gestion admin
	public function deleteUser($id) {
		$requete = "DELETE FROM users WHERE users.id_user = :id ;";
		$tableau = array(
		'id' => $id
		);
		$this->db->execute($requete,$tableau);
	}

	//modifie les information de l'user avec l'id $id, utilisé par l'admin ou par l'user dans la fenetre "mon compte" 
	public function modifyUser($nom,$prenom,$email,$adresse,$id){
		$requete = "UPDATE users SET users.nom = :nom, users.prenom = :prenom, users.email = :email, users.adresse = :adresse WHERE users.id_user = ".$id.";";
		$tableau = array(
		'nom' => $nom,
		'prenom' => $prenom,
		'email' => $email,
		'adresse' => $adresse 
		);
		$this->db->execute($requete,$tableau);
	}

	//recupere les informations pour une liste d'user, utilisé dans le tableau de gestion admin
	public function listUsers(){
		$requete = "SELECT users.id_user, users.nom, users.prenom, users.email, users.adresse FROM users;";
		$result = $this->db->get($requete);
		return $result;
	}

	// recupere les info d'un user par l'id
	public function getUser($id){
		$requete = "SELECT users.nom, users.prenom, users.email, users.adresse FROM users WHERE users.id_user = ".$id.";";
		$result = $this->db->get($requete);
		return $result;
	}

	//associe un Email/Password a un utilisateur pour permettre la connexion
	public function connexions($email,$password){
		$requete = "SELECT users.id_user, users.nom, users.prenom, users.email, users.adresse FROM users WHERE users.email = '".$email."' AND users.password = '".$password."';";
		$result = $this->db->get($requete);
		return $result;
	}
}