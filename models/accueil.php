<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/library/db.php");

class Model_Accueil {
	private $db;

	public function __construct(){
		$this->db = DB::getInstance();
	}

// recupere les données pour la page d'accueil
	public function starterAccueilArticles() {
		$requete = "SELECT pokemons.id_pokemon, pokemons.nom, pokemons.prix, pokemons.niveau, images_pokemons.url_portrait, images_pokemons.url_miniature FROM Pokemons INNER JOIN images_pokemons ON pokemons.id_image = images_pokemons.id_image WHERE pokemons.nom IN ('Florizarre','Dracaufeu','Tortank');";
		$resultat = $this->db->get($requete);
		return $resultat;
	}

}

?>