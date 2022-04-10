<div class="card mb-5 hide">
	<div class="card-header">
		<h3 class="text-center">
			<?= ($leContrat != null ? "Modification" : "Insertion"); ?> d'un contrat
		</h3>
	</div>
	<div class="card-body  ">
		<form method="post" action="">
			<div class="mb-3">
				<label for="client" class="form-label">Client</label>
				<select name="idclient" id="client" class="form-select">
					<?php
					$unControleur->setTable("client");
					$lesClients = $unControleur->selectAll();
					foreach ($lesClients as $unClient) { ?>
						<option value="<?= $unClient['idclient']; ?>"
							<?php if ($unClient['idclient'] == $leContrat['idclient']) :?> selected="selected" <?php endif; ?>>
							<?= $unClient['idclient']; ?> - <?= $unClient['nom']; ?>
						</option>
					<?php } ?>
				</select>
		    </div>
			<div class="mb-3">
				<label for="dateS" class="form-label">Date de souscription</label>
				<input type="date" name="date_souscription" id="dateS" class="form-control" value="<?= ($leContrat != null ? $leContrat['date_souscription'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="montant" class="form-label">Montant MHT</label>
				<input type="text" name="montant_mensuel_ht" id="montant" class="form-control" value="<?= ($leContrat != null ? $leContrat['montant_mensuel_ht'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="etat" class="form-label">Etat</label>
				<select name="etat_du_contrat" class="form-select">
					<option value="valide" <?= $leContrat['etat_du_contrat'] == 'valide' ? 'selected="selected"' : ''?>> Valide </option>
                    <option value="résilié" <?= $leContrat['etat_du_contrat'] == 'résilié' ? 'selected="selected"' : ''?>> Résilié </option>
					<option value="en cours" <?= $leContrat['etat_du_contrat'] == 'en cours' ? 'selected="selected"' : ''?>> En cours </option>
				</select>
			</div>
			<div class="mb-3">
				<label for="objet_du_contrat" class="form-label">Objet du contrat</label>
				<input type="text" name="objet_du_contrat" id="dateS" class="form-control" value="<?= ($leContrat != null ? $leContrat['objet_du_contrat'] : null); ?>">
			</div>
			<div class="d-flex justify-content-center">
				<button type="reset" class="btn btn-danger me-2">Annuler</button>
				<button type="submit" <?= ($leContrat != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
					<?= ($leContrat != null ? "Modifier" : "Ajouter"); ?>
				</button>
			</div>
		</form>
	</div>
</div>
