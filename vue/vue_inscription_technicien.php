<div class="container">
    <div class="card mb-5">
        <div class="card-header">
            <h3 class="text-center mb-3">
                Inscription d'un technicien
            </h3>
        </div>
        <div class="card-body ">
            <form method="post" action=""  class="needs-validation" novalidate>
                <p>Les élements avec le symbole (*) sont requis</p>
                <div class="mb-3">
                    <label for="name" class="form-label">Nom *</label>
                    <input type="text" name="nom" id="name" class="form-control" required>
                    <div class="invalid-feedback">Votre nom ne doit pas contenir de chiffre ou caractéres speciaux</div>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" required>
                    <div class="invalid-feedback">Votre prénom ne doit pas contenir de chiffre ou caractéres speciaux</div>
                </div>
                <div class="mb-3">
                    <label for="disponibilite" class="form-label">Disponibilité</label>
                    <select name="disponibilite" class="form-select">
                        <option value="nuit"> Nuit </option>
                        <option value="jour"> Jour </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tarif_horaire" class="form-label">Tarif horaire</label>
                    <input type="text" name="tarif_horaire" id="tarif_horaire" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Tel</label>
                    <input type="text" name="tel" id="tel" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" id="mail" class="form-control" required>
                    <div id="email-validation" class="invalid-feedback">Vérifier votre email</div>
                </div>
                <div class="mb-5">
                    <label for="mdp" class="form-label">Mot de passe *</label>
                    <input type="password" name="mdp" id="mdp" class="form-control mb-3" required>
                    <div class="invalid-feedback">Votre mot de passe doit contenir au minimum : <br> 
                    - 8 caractères <br>
                    - 1 majuscule <br>
                    - 1 caractère spécial
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="reset" class="btn btn-danger me-2">Annuler</button>
                    <button type="submit" name ="ValiderTechnicien" class="btn btn-success">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/bootstrap-validate-technicien.js"></script>