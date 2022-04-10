
<?php if (isset($_SESSION['role']) and $_SESSION['role'] == "admin" ) { ?>
<div class="card mb-5">
    <div class="card-header">
        <h3 class="text-center">Rechercher un client</h3>
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
<?php } ?>


<div class="card">
    <div class="card-header">
        <h3 class="text-center"><?= ($_SESSION['role'] == "admin" ? "Liste des clients" : "Fiche client"); ?></h3>
    </div>
    <div class="card-body bg-dark text-white">
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</td>
                    <th scope="col">Siret</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">CP</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Mdp</th>
                    <?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
                    <th scope="col">Opérations</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lesClients as $unClient) { ?>
                <tr>
                    <td><?= $unClient['idclient']; ?></td>
                    <td><?= $unClient['nom']; ?></td>
                    <td><?= $unClient['siret']; ?></td>
                    <td><?= $unClient['tel']; ?></td>
                    <td><?= $unClient['email']; ?></td>
                    <td><?= $unClient['adresse']; ?></td>
                    <td><?= $unClient['CP']; ?></td>
                    <td><?= $unClient['ville']; ?></td>
                    <td>••••••••••••••••••••••••</td>
                    <td>
                        <a href="index.php?page=1&action=edit&idclient=<?=$unClient['idclient'];?>" class="btn btn-primary me-2 container">Modifier</a>
                    <?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
                        <a href="index.php?page=1&action=sup&idclient=<?=$unClient['idclient'];?>" class="btn btn-danger mt-1 container">Supprimer</a>
                    <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


