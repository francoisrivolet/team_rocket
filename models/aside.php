<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/library/db.php");

class Model_Aside {
	private $db;

	public function __construct(){
		$this->db = DB::getInstance();
	}

	//recupere l'id d'un pokemon grace a son nom, utilisé dans la barre de recherche
	public function getIds($nom) {
		$requete = "SELECT pokemons.id_pokemon FROM pokemons WHERE pokemons.nom = '".$nom."';";
		$resultat = $this->db->get($requete);
		return $resultat;
	}
}