<div class="card mb-5">
    <div class="card-header">
        <h3 class="text-center">
            <?= ($lePlanning != null ? "Modification" : "Insertion"); ?> d'un planning
        </h3>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="mb-3">
                <label for="idtechnicien" class="form-label">Id Technicien</label>
                <select name="idtechnicien" id="idtechnicien" class="form-select">
                    <?php
                    $unControleur->setTable("technicien");
                    $lesTechniciens = $unControleur->selectAll();
                    foreach ($lesTechniciens as $unTechnicien) { ?>
                        <option value="<?= $unTechnicien['idtechnicien']; ?>" 
                            <?php if ($unTechnicien['idtechnicien'] == $lePlanning['idtechnicien']) :?> selected="selected" <?php endif; ?>>
                            <?= $unTechnicien['idtechnicien']; ?> - <?= $unTechnicien['nom']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="numI" class="form-label">N° Intervention</label>
                <select name="num_intervention" id="num_intervention" class="form-select">
                    <?php
                    $unControleur->setTable("intervention");
                    $lesInterventions = $unControleur->selectAll();
                    foreach ($lesInterventions as $uneIntervention) { ?>

                        <option value="<?= $uneIntervention['num_intervention']; ?>"
                            <?php if ($uneIntervention['num_intervention'] == $lePlanning['num_intervention']) : ?> selected="selected" <?php endif; ?>>

                            <?= $uneIntervention['num_intervention']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="dateHD" class="form-label">Date Heure Début</label>
                <input type="datetime-local" name="date_heure_debut" id="dateHD" class="form-control" value="<?= ($lePlanning != null ? $lePlanning['date_heure_debut'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="dateHF" class="form-label">Date Heure Fin</label>
                <input type="datetime-local" name="date_heure_fin" id="dateHF" class="form-control" value="<?= ($lePlanning != null ? $lePlanning['date_heure_fin'] : null); ?>">
            </div>
            <div class="d-flex justify-content-center">
                <button type="reset" class="btn btn-danger me-2">Annuler</button>
                <button type="submit" <?= ($lePlanning != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
                    <?= ($lePlanning != null ? "Modifier" : "Ajouter"); ?>
                </button>
            </div>
        </form>
    </div>
</div>