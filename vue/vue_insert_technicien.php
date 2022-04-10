<div class="card mb-5">
    <div class="card-header">
        <h3 class="text-center mb-3">
            <?= ($leTechnicien != null ? "Modification" : "Insertion"); ?> d'un technicien
        </h3>
    </div>
    <div class="card-body ">
        <form method="post" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du technicien</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= ($leTechnicien != null ? $leTechnicien['nom'] : null); ?>" >
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom du technicien</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?= ($leTechnicien != null ? $leTechnicien['prenom'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="disponibilite" class="form-label">Disponibilité du technicien</label>
                <select name="disponibilite" class="form-select">
                    <option value="nuit" <?= $leTechnicien['disponibilite'] == 'nuit' ? 'selected="selected"' : ''?>> Nuit </option>
                    <option value="jour" <?= $leTechnicien['disponibilite'] == 'jour' ? 'selected="selected"' : ''?>> Jour </option>
                </select> 
            </div>
            <div class="mb-3">
                <label for="tarif_horaire" class="form-label">Tarif horaire du technicien</label>
                <input type="text" name="tarif_horaire" id="tarif_horaire" class="form-control" value="<?= ($leTechnicien != null ? $leTechnicien['tarif_horaire'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Tel du technicien</label>
                <input type="text" name="tel" id="tel" class="form-control" value="<?= ($leTechnicien != null ? $leTechnicien['tel'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email du technicien</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= ($leTechnicien != null ? $leTechnicien['email'] : null); ?>">
            </div>
            <div class="mb-5">
                <label for="mdp" class="form-label">Mot de passe du technicien</label>
                <input type="password" name="mdp" id="mdp" class="form-control" value="<?= ($leTechnicien != null ? $leTechnicien['mdp'] : null); ?>">
            </div>
            <div class="d-flex justify-content-center">
                <button type="reset" class="btn btn-danger me-2">Annuler</button>
                <button type="submit" <?= ($leTechnicien != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
                    <?= ($leTechnicien != null ? "Modifier" : "Ajouter"); ?>
                </button>
            </div>
        </form>
    </div>
</div>