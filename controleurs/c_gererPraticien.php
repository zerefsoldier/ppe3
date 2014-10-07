<?php
	/*
		Si il y a pas de connexion en ajax alors il faut inclure le sommaire responsable si c'est un responsable ou le sommaire
		visiteur si c'est un visiteur
	*/
	/**
		En premier lieu on demande d'afficher la vue pour la gestion des praticiens
		Concernant cette vue
		$options = tableau["suppression", "ajout"];
		Si c'est un visiteur
			alors ajouter une donnée au tableau option qui est "visionnage";
		Sinon
			alors ajouter une donnée au tableau option qui est "modification";
		Afficher la vue de gestion des praticiens en utilisant les données du tableau

		Ajout d'un praticien (reservé)
		Modification d'une affectation
			Prendre les praticiens affectés au visiteur ou prendre l'ensemble des praticiens


		Gerer les praticiens (uniquement sous forme de requete ajax)
		importer le fichier comportant la classe PdoGsb
		Si c'est une modification d'affectation à un praticien alors
			avoir l'ancien nom, l'ancien prenom, le nouveau nom, le nouveau prenom sous forme de posts envoyés par l'utiliateur ($_POST)
			appliquer une méthode faisant la modification des champs dans la base de données
			Afficher une vue avec l'affichage d'une validation du processus ou d'une erreur pendant le processus
		Sinon si c'est un ajout d'affectation à un praticien alors
			avoir le nouveau nom et le nouveau prénom sous forme de posts envoyés par l'utiliateur ($_POST)
			appliquer une méthode faisant l'ajout dans la base de données
			Afficher une vue avec l'affichage d'une validation du processus ou d'une erreur pendant le processus
		Sinon si c'est une suppression d'affectation à un praticien alors
			avoir le nom et le prénom du praticien à supprimer sous forme de posts envoyés par l'utiliateur ($_POST)
			appliquer une méthode faisant la suppression dans la base de données
			Afficher une vue avec l'affichage d'une validation du processus ou d'une erreur pendant le processus
		Sinon si c'est un visionnage d'affectation de praticiens
			créer une méthode retournant tout les praticiens de la base de données
			afficher le résultat dans une vue
		Sinon si c'est un ajout de praticien
			avoir le nom et le prénom du nouveau praticien
			l'insérer dans la table praticien

		Au niveau des vues 
			la vue d'ajout des praticiens : comporte un nom et un prénom
			La vue de modification des praticiens pour une affectation affichera
				pour un visiteur
					Le ou les praticien(s) affectés au visiteur.
					Une liste deroulante avec la liste des praticiens possibles pour le visiteur et non affectés
				Pour un responsable
					Une liste des affectations (possibilitée de modifier soit le visteur soit le praticien)
			La vue de suppression des praticiens pour une affectation
				Pour un visiteur
					Afficher les praticiens qui lui sont affectés
				Pour un responsable
					Afficher toute les affectations
	*/
	if (isset($_POST["connexionAjax"])){
		session_start();
		require_once("../include/class.pdogsb.inc.php");
	}
	else{
		if ($_SESSION["responsable"] == "non")
			require_once("vues/v_sommaire.php");
		else
			require_once("vues/v_responsable.php");
	}
	if (isset($_REQUEST["action"])){
		switch ($_REQUEST["action"]){
			case "recherchePersonnes":
				require_once("vues/v_recherche.php");
				?>
					<script type="text/javascript" src="js/recherche_personnes.js"></script>
				<?php
			break;
			case "lancementRecherche":
				if (isset($_POST["personneRecherchee"]) && !empty($_POST["personneRecherchee"])){
					$pdoGsb = PdoGsb::getPdogsb();
					$personneRecherchees = $pdoGsb->recherchePersonne($_POST["personneRecherchee"]);
					foreach ($personneRecherchees as $personneRecherchee){
						require("../vues/v_personne_recherchee.php");
					}
				}
			break;
			case "afficheVisites":
				if (isset($_POST["nom"]) && isset($_POST["prenom"])){
					$pdoGsb = PdoGsb::getPdogsb();
					$visites = $pdoGsb->retourneVisites($_POST["nom"], $_POST["prenom"]);
					foreach ($visites as $visite){
						require("../vues/v_visite.php");
					}
				}
			break;
			default:
				require_once("vues/v_erreur_404.php");
			break;
		}
	}
?>
