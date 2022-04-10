<div class="card mb-5">
    <div class="card-header">
        <h3 class="text-center">Rechercher une intervention</h3>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="mb-3">
                <label for="mot" class="form-label">Mot de recherche</label>
                <input type="search" name="mot" id="mot" class="form-control">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="Rechercher" class="btn btn-light bg-success text-white">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="text-center">Liste des interventions</h3>
    </div>
    <div class="card-body bg-dark text-white">
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Numéro intervention</td>
                    <th scope="col">Numéro contrat</th>
                    <th scope="col">Date heure affectation</th>
                    <th scope="col">Etat intervention</th>
                    <?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
                    <th scope="col">Opérations</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lesInterventions as $uneIntervention) { ?>
                <tr>
                    <td><?= $uneIntervention['num_intervention']; ?></td>
                    <td><?= $uneIntervention['num_contrat']; ?></td>
                    <td><?= $uneIntervention['date_heure_affectation']; ?></td>
                    <td><?= $uneIntervention['etat_intervention']; ?> </td>


                    <?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
                    <td>
                        <a href="index.php?page=4&action=edit&num_intervention=<?= $uneIntervention['num_intervention']; ?>" class="btn btn-primary me-2">Modifier</a>
                        <a href="index.php?page=4&action=sup&num_intervention=<?= $uneIntervention['num_intervention']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
