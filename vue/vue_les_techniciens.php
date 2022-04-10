
<?php if (isset($_SESSION['role']) and $_SESSION['role'] == "admin" ) { ?>
<div class="card mb-5">
    <div class="card-header">
        <h3 class="text-center">Rechercher un technicien</h3>
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
        <h3 class="text-center"><?= ($_SESSION['role'] == "admin" ? "Liste des techniciens" : "Information technicien"); ?></h3>
    </div>
    <div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nom</td>
					<th scope="col">Prénom</th>
					<th scope="col">Disponibilité</th>
					<th scope="col">Tarif horaire</th>
					<th scope="col">Tel</th>
					<th scope="col">Email</th>
					<th scope="col">Mdp</th>
					<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
					<th scope="col">Opérations</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($lesTechniciens as $unTechnicien) { ?>
				<tr>
					<td><?= $unTechnicien['idtechnicien']; ?></td>
					<td><?= $unTechnicien['nom']; ?></td>
					<td><?= $unTechnicien['prenom']; ?></td>
					<td><?= $unTechnicien['disponibilite']; ?></td>
					<td><?= $unTechnicien['tarif_horaire']; ?></td>
					<td><?= $unTechnicien['tel']; ?></td>
					<td><?= $unTechnicien['email']; ?></td>
					<td>••••••••••••••••••••••••</td>
					<td>
						<a href="index.php?page=3&action=edit&idtechnicien=<?= $unTechnicien['idtechnicien']; ?>" class="btn btn-primary me-2">Modifier</a>
					<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
						<a href="index.php?page=3&action=sup&idtechnicien=<?= $unTechnicien['idtechnicien']; ?>" class="btn btn-danger">Supprimer</a>
					<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>