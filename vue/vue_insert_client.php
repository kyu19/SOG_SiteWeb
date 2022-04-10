<div id="insertc" class="card mb-5">
    <div class="card-header">
        <h3 class="text-center mb-3">
            <?= ($leClient != null ? "Modification" : "Insertion"); ?> d'un client  
        </h3>
    </div>
    <div class="card-body ">
        <form method="post" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du client</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= ($leClient != null ? $leClient['nom'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="siret" class="form-label">Siret du client</label>
                <input type="number" name="siret" id="siret" class="form-control" value="<?= ($leClient != null ? $leClient['siret'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Tel du client</label>
                <input type="text" name="tel" id="tel" class="form-control" value="<?= ($leClient != null ? $leClient['tel'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email du client</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= ($leClient != null ? $leClient['email'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse du client</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="<?= ($leClient != null ? $leClient['adresse'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="CP" class="form-label">CP du client</label>
                <input type="text" name="CP" id="CP" class="form-control" value="<?= ($leClient != null ? $leClient['CP'] : null); ?>">
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">ville du client</label>
                <input type="text" name="ville" id="ville" class="form-control" value="<?= ($leClient != null ? $leClient['ville'] : null); ?>">
            </div>
            <div class="mb-5">
                <label for="mdp" class="form-label">Mot de passe du client</label>
                <input type="password" name="mdp" id="mdp" class="form-control" value="<?= ($leClient != null ? $leClient['mdp'] : null); ?>">
            </div>
            <div class="d-flex justify-content-center">
                <button type="reset" class="btn btn-danger me-2">Annuler</button>
                <button type="submit" <?= ($leClient != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
                    <?= ($leClient != null ? "Modifier" : "Ajouter"); ?>
                </button>
            </div>
        </form>
    </div>
</div>