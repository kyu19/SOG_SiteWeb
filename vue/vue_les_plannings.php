<div class="card mb-5">
    <div class="card-header">
        <h3 class="text-center">Rechercher un planning</h3>
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
        <h3 class="text-center">Liste des plannings</h3>
    </div>
    <div class="card-body bg-dark text-white">
        <table class="table table-dark table-striped text-center">
              <thead>
                <tr>
                      <th scope="col">Id technicien</th>
                      <th scope="col">Id intervention</th>
                      <th scope="col">Date heure début</th>
                      <th scope="col">Date heure fin</th>
                      <?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
                      <th scope="col">Opérations</th>
                      <?php } ?>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($lesPlannings as $unPlanning) { ?>
                <tr>
                      <td><?= $unPlanning['idtechnicien']; ?></td>
                      <td><?= $unPlanning['num_intervention']; ?></td>
                      <td><?= $unPlanning['date_heure_debut']; ?></td>
                      <td><?= $unPlanning['date_heure_fin']; ?></td>

                      <?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
                      <td>
                          <a href="index.php?page=5&action=edit&idtechnicien=<?= $unPlanning['idtechnicien']; ?>&num_intervention=<?= $unPlanning['num_intervention']; ?>&date_heure_debut=<?= $unPlanning['date_heure_debut']; ?>" class="btn btn-primary me-2">Modifier</a>

                          <a href="index.php?page=5&action=sup&idtechnicien=<?= $unPlanning['idtechnicien']; ?>
                          &num_intervention=<?= $unPlanning['num_intervention']; ?>
                          &date_heure_debut=<?= $unPlanning['date_heure_debut']; ?>
                          " class="btn btn-danger">Supprimer</a>
                      </td>
                      <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
        </table>
    </div>
</div>