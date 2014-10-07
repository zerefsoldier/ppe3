$("#champ_recherche").click(function(){
	$(this).width = "30%";
});

$("#champ_recherche").mouseout(function(e){
	$(this).width = "20%";
});

$("#champ_recherche").keyup(function(){
	if ($(this).val() != ""){
		$("#affichage_chaine_recherche").html("Résultat(s) de recherche pour " + $(this).val());
		$.post("controleurs/c_gererPraticien.php", {"connexionAjax" : "", "action" : "lancementRecherche", "personneRecherchee" : $(this).val()}).done(function(datas){
			$("#resultats_recherche").html(datas);
			$(".onglet_affichage_visite").click(function(){
				$.post("controleurs/c_gererPraticien.php", {"connexionAjax" : "", "action" : "afficheVisites", "nom" : $(this).parent().first().last().text(), "prenom" : $(this).parent().first().first().text()}).done(function(datas){
					$("#visites").html(datas);
				});
			});
		});
	}
	else{
		$("#affichage_chaine_recherche").html("");
		$("#resultats_recherche").html("Entrez une recherche pour afficher les résultats");
	}
});