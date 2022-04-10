<div class="card mb-5">
    <div class="card-header">
        <h3 class="text-center">
            <?= ($leIntervention != null ? "Modification" : "Insertion"); ?> d'une intervention
        </h3>
    </div>
    <div class="card-body">
        <form method="post" action="">
           
            <div class="mb-3">
                <label for="num_contrat" class="form-label"> Le contrat concerné</label>
                <select name="num_contrat" id="num_contrat" class="form-select">
                    <?php
                    $unControleur->setTable("contrat");
                    $lesContrats = $unControleur->selectAll();
                    foreach ($lesContrats as $unContrat) { ?>
                        <option value="<?= $unContrat['num_contrat']; ?>" <?php if ($unContrat['num_contrat'] == $leIntervention['num_contrat']) : ?>
                        selected="selected" <?php endif; ?>>
                            <?= $unContrat['num_contrat']; ?>
                        </option>
                    <?php } ?>
                </select>
            
            </div>
             <div class="mb-3">
                <label for="date_heure_affectation" class="form-label">Date heure affectation</label>
                <input type="datetime-local" name="date_heure_affectation" class="form-control" value="<?= ($leIntervention != null ? $leIntervention['date_heure_affectation'] : null); ?>">
            </div>
             <div class="mb-3">
                <label for="etat_intervention" class="form-label">Etat intervention</label>
                <select name="etat_intervention" class="form-select" value="<?= ($leIntervention != null ? $leIntervention['etat_intervention'] : null); ?>">
                    <option value="terminée"> Terminée </option>
                    <option value="en suspend"> En suspend </option>
                    <option value="en cours"> En cours </option>
                </select>
            </div>

            <div class="d-flex justify-content-center">
                <button type="reset" class="btn btn-danger me-2">Annuler</button>
                <button type="submit" <?= ($leIntervention != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
                    <?= ($leIntervention != null ? "Modifier" : "Ajouter"); ?>
                </button>
            </div>
        </form>
    </div>
</div>
