<?php
require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/library/db.php");

class Model_Article {
	private $db;

	public function __construct(){
		$this->db = DB::getInstance();
	}

	// recupere les données nessecaire pour les listes.
	public function listArticles() {
		$requete = "SELECT pokemons.id_pokemon, pokemons.nom, pokemons.prix, pokemons.niveau, pokemons.stock, images_pokemons.url_miniature, images_pokemons.url_portrait FROM Pokemons INNER JOIN images_pokemons ON pokemons.id_image = images_pokemons.id_image;";
		$resultat = $this->db->get($requete);
		return $resultat;
	}

	// recupere les details d'un pokemon par le type
	public function articlesDetailsByTypes($types){
		$requete = "SELECT pokemons.id_pokemon, pokemons.nom, pokemons.niveau, pokemons.prix, pokemons.stock, images_pokemons.url_portrait FROM pokemons INNER JOIN possede ON pokemons.id_pokemon = possede.id_pokemon INNER JOIN types ON possede.id_type = types.id_type INNER JOIN images_pokemons ON pokemons.id_image = images_pokemons.id_image WHERE types.nom = '".$types."';";
		$result = $this->db->get($requete);
		return $result;
	}

	// recupere les details d'un pokemon par l'id
	public function articleDetails($id) {
		$requete = "SELECT pokemons.id_pokemon, pokemons.nom, pokemons.prix, pokemons.niveau, pokemons.stock FROM Pokemons WHERE pokemons.id_pokemon = ".$id."; ";
		$resultat = $this->db->get($requete);
		return $resultat;
	}

	// recupere les images d'un pokemon par l'id
	public function articleImages($id) {
		$requete = "SELECT images_pokemons.url_portrait, images_pokemons.url_miniature FROM pokemons INNER JOIN images_pokemons ON pokemons.id_pokemon = images_pokemons.id_image WHERE pokemons.id_pokemon = ".$id."; ";
		$result = $this->db->get($requete);
		return $result ;
	}

	// recupere le(s) type(s) par l'id
	public function articleTypes($id) {
		$requete = "SELECT types.nom FROM pokemons INNER JOIN possede ON pokemons.id_pokemon = possede.id_pokemon INNER JOIN types ON possede.id_type = types.id_type WHERE pokemons.id_pokemon = ".$id."; ";
		$resultat = $this->db->get($requete);
		return $resultat;
	}

	// recupere les stats par l'id
	public function articleStats($id) {
		$requete = "SELECT stats.pv, stats.attaque, stats.defense, stats.attaque_spe, stats.defense_spe, stats.vitesse FROM pokemons INNER JOIN stats ON pokemons.id_stats = stats.id_stats WHERE pokemons.id_pokemon = ".$id.";";
		$result = $this->db->get($requete);
		return $result;
	}

	//modifie les details de l'article avec l'id $id
	public function modifyDetailsArticle($nom,$niveau,$prix,$stock,$id){
		$requete = "UPDATE pokemons SET pokemons.nom = :nom, pokemons.niveau = :niveau, pokemons.prix = :prix, pokemons.stock = :stock WHERE pokemons.id_pokemon = ".$id.";";
		$tableau = array(
			'nom' => $nom,
			'niveau' => $niveau,
			'prix' => $prix,
			'stock' => $stock,		
			);
		$this->db->execute($requete,$tableau);
	}

	//modifie les images de l'article avec l'id $id
	public function modifyImagesArticle($url_portrait,$url_miniature,$id){
		$requete2 = "UPDATE images_pokemons SET images_pokemons.url_portrait = :url_portrait, images_pokemons.url_miniature = :url_miniature WHERE images_pokemons.id_image = ".$id.";";
		$tableau = array(
			'url_portrait' => $url_portrait,
			'url_miniature' => $url_miniature
			);
		$this->db->execute($requete2,$tableau);
	}

	//modifie les Stats de l'article avec l'id $id
	public function modifyStatsArticle($pv,$attaque,$defense,$attaque_spe,$defense_spe,$vitesse,$id){
		$requete3 = "UPDATE stats SET stats.pv = :pv, stats.attaque = :attaque, stats.defense = :defense, stats.attaque_spe = :attaque_spe, stats.defense_spe = :defense_spe, stats.vitesse = :vitesse WHERE stats.id_stats = ".$id.";";
		$tableau = array(
			'pv' => $pv, 
			'attaque' => $attaque,
			'defense' => $defense,
			'attaque_spe' => $attaque_spe,
			'defense_spe' => $defense_spe,
			'vitesse' => $vitesse
			);
		$this->db->execute($requete3,$tableau);
	}

}

?>