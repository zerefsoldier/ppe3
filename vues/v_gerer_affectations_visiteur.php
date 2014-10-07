<p><?php print("Gerez vos affectations (suppression et ajout)"); ?></p>
<p id="infosStatutAction"></p>
<table>
	<tr>
		<td>Praticien affecté</td>
		<td>Actions rapides</td>
	</tr>
	<tr id="ajout_affectation">
		<p>Ajouter une affectation à un praticien</p>
		<div>
		</div>
	</tr>
	<?php
		foreach ($tableauPraticiens as $praticien){
			?>
				<tr>
					<td>
						<p>
							<span id="prenomPraticien">
								<?php 

									print($praticien["prenomPraticien"]); 
								?>
							</span>
							<span id="nomPraticien">
								<?php
									print(" ".$praticien["nomPraticien"]);
								?>
							</span>
						</p>
					</td>
					<td>
						<img src="images/modification.png" id="action_rapide" type="modification" alt="modifier cette affectation" />
					</td>
				</tr>
			<?php
		}
	?>
</table>