﻿<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array($visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			$statut = $visiteur["statut"];
			$rang = "";
			if ($statut == "visiteur")
				$rang = $visiteur["responsable"];
			connecter($id,$nom,$prenom, $statut, $rang);
			if ($visiteur["statut"] == "visiteur" && $visiteur["responsable"] == "non")
				require_once("vues/v_sommaire.php");
			else if ($visiteur["statut"] == "visiteur" && $visiteur["responsable"] == "oui")
				require_once("vues/v_responsable.php");
			else
				require_once("vues/v_praticien.php");
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>