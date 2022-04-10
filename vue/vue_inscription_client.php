<div class="container mb-5">
    <div class="card mb-5">
        <div class="card-header">
            <h3 class="text-center mb-3">
                Inscription d'un client
            </h3>
        </div>
        <div class="card-body ">
            <form method="post" action="" class="needs-validation" novalidate>
                <p>Les élements avec le symbole (*) sont requis</p>
                <div class="mb-3">
                    <label for="libelle" class="form-label">Nom *</label>
                    <input type="text" name="nom" id="libelle" class="form-control" required>
                    <div class="invalid-feedback">Votre nom ne doit pas contenir de chiffre ou caractéres speciaux</div>
                </div>
                <div class="mb-3">
                    <label for="siret" class="form-label">N° Siret *</label>
                    <input type="number" name="siret" id="siret" class="form-control" required>
                    <div class="invalid-feedback">Votre siret doit contenir uniquement 14 chiffres</div>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Tel</label>
                    <input type="text" name="tel" id="tel" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">Email *</label>
                    <input type="email" name="email" id="mail" class="form-control" required>
                    <div id="email-validation" class="invalid-feedback">Vérifier votre email</div>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="CP" class="form-label">CP</label>
                    <input type="text" name="CP" id="CP" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">ville</label>
                    <input type="text" name="ville" id="ville" class="form-control">
                </div>
                <div class="mb-5">
                    <label for="mdp" class="form-label">Mot de passe *</label>
                    <input type="password" name="mdp" id="mdp" class="form-control mb-4" required>
                    <div class="invalid-feedback">Votre mot de passe doit contenir au minimum : <br> 
                    - 8 caractères <br>
                    - 1 majuscule <br>
                    - 1 caractère spécial
                </div>
                <div class="d-flex justify-content-center">
                    <button type="reset" class="btn btn-danger me-2">Annuler</button>
                    <button type="submit" name = "ValiderClient" class="btn btn-success">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/bootstrap-validate-client.js"></script>
