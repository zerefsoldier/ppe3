<div>
	<ul>
		<p>Visiteur : <?php print($_SESSION["prenom"]." ".$_SESSION["nom"]); ?></p>
		<br>
		<li>
			<a href="index.php?uc=gererPraticiens&action=recherchePersonnes">Recherche de visiteurs</a>
		</li>
		<li>
			<a href="index.php?uc=gererPraticiens&action=modificationAffectations">Modifier les affectations</a>
		</li>
		<li>
			<a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
		</li>
	</ul>
</div>