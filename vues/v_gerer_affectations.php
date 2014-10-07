<select id="liste_actions" responsable="<?php print($_SESSION["responsable"]); ?>">
	<option value="default">--- Selectionner un type d'action ----</option>
	<?php
		foreach ($options as $option){
			?>
				<option value="<?php print($option[0]); ?>"><?php print($option[1]); ?></option>
			<?php
		}
	?>
	<p id="info_action"></p>
</select>
<div>
	<table id="liste_affectations">
		<tr>
			<td>Praticien</td>
			<td>Visiteur</td>
			<td>Région</td>
		</tr>
		<?php
			foreach ($tableauPraticiens as $praticien){
				?>
					<tr class="affectation">
						<td>
							<?php
								print($praticien["prenomPraticien"]." ".$praticien["nomPraticien"]);
							?>
						</td>
						<td>
							<?php
								print($praticien["prenomVisiteur"]." ".$praticien["nomVisiteur"]);
							?>
						</td>
						<td>
							<?php
								print($praticien["affectation"]);
							?>
						</td>
					</tr>
				<?php
			}
		?>
	</table>
</div>
<div id="visites">
</div>
<div id="modifierAffectation">
</div>