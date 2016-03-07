<?php 


	function creationPanier(){
   		if (!isset($_SESSION['panier'])){
     		$_SESSION['panier']=array();
      		$_SESSION['panier']['pokemon'] = array();
      		$_SESSION['panier']['qteProduit'] = array();
      		$_SESSION['panier']['prix'] = array();
	   }
	   return true;
	}

	function ajouterArticle($nom,$qteProduit,$prix){

	   //Si le panier existe
	   if (creationPanier())
	   {
	      //Si le produit existe déjà on ajoute seulement la quantité
	      $positionProduit = array_search($nom, $_SESSION['panier']['pokemon']);

	      if ($positionProduit !== false)
	      {
	         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
	      }
	      else
	      {
	         //Sinon on ajoute le produit
	         array_push( $_SESSION['panier']['pokemon'],$nom);
	         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
	         array_push( $_SESSION['panier']['prix'],$prix);
	      }
	   }
	   else
	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}

	function supprimerArticle($nom){
	   //Si le panier existe
	   if (creationPanier())
	   {
	      //Nous allons passer par un panier temporaire
	      $tmp=array();
	      $tmp['pokemon'] = array();
	      $tmp['qteProduit'] = array();
	      $tmp['prix'] = array();

	      for($i = 0; $i < count($_SESSION['panier']['pokemon']); $i++)
	      {
	         if ($_SESSION['panier']['pokemon'][$i] !== $nom)
	         {
	            array_push( $tmp['pokemon'],$_SESSION['panier']['pokemon'][$i]);
	            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
	            array_push( $tmp['prix'],$_SESSION['panier']['prix'][$i]);
	         }

	      }
	      //On remplace le panier en session par notre panier temporaire à jour
	      $_SESSION['panier'] =  $tmp;
	      //On efface notre panier temporaire
	      unset($tmp);
	   }
	   else
	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}

	function modifierQTeArticle($nom,$qteProduit){
	   //Si le panier éxiste
	   if (creationPanier())
	   {
	      //Si la quantité est positive on modifie sinon on supprime l'article
	      if ($qteProduit > 0)
	      {
	         //Recharche du produit dans le panier
	         $positionProduit = array_search($nom,  $_SESSION['panier']['pokemon']);

	         if ($positionProduit !== false)
	         {
	            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
	         }
	      }
	      else
	      supprimerArticle($nom);
	   }
	   else
	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}

	function MontantGlobal(){
	   $total=0;
	   for($i = 0; $i < count($_SESSION['panier']['pokemon']); $i++)
	   {
	      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prix'][$i];
	   }
	   return $total;
	}

	function supprimePanier(){
	   unset($_SESSION['panier']);
	}
