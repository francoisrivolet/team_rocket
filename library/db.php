<?php
class DB {
	private static $_instance = null;
	public $connexionBDD =null;

	private function __construct(){
		$this->connexionBDD = new PDO('mysql:host=localhost;dbname=boutique_pokemon','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  //permet de creer une seule fois la connexion a la bdd, 
		$this->connexionBDD->exec('SET NAMES utf8');
	}

	public static function getInstance() {
		if(is_null(self::$_instance)) {// créér une instance de la bdd si aucune n'existe 
			self::$_instance = new DB(); 
		}
		return self::$_instance;
	}

	public function get($requete){
		$reponse = self::$_instance->connexionBDD->query($requete);
		$resultat = $reponse->fetchAll();
	return $resultat;
	}

	public function execute($requete,$tab){
		$prepare = self::$_instance->connexionBDD->prepare($requete);
		$result = $prepare->execute($tab);
	}
}
