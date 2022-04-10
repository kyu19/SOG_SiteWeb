<div class="card mb-5 hide">
    <div class="card-header">
        <h3 class="text-center">Rechercher un contrat</h3>
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
		<h3 class="text-center">Liste des contrats</h3>
	</div>
	<div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
		  	<thead>
		    	<tr>
		      		<th scope="col">N° Client</th>
		      		<th scope="col">Nom Client</td>
		      		<th scope="col">Siret Client</td>
		      		<th scope="col">Tel</th>
		      		<th scope="col">email</th>
		      		<th scope="col">adresse</th>
		      		<th scope="col">ville</th>
		      		<th scope="col">N° Contrat</th>
					<th scope="col">Date de souscription</th>
					<th scope="col">Montant MHT</th>
					<th scope="col">Etat</th>
					<th scope="col">Objet du contrat</th>
		      		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
		      		<th class="hide" scope="col">Opérations</th>
		      		<?php } ?>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($lesContrats as $unContrat) { ?>
		    	<tr>
		      		<td><?= $unContrat['idclient']; ?></td>
		      		<td><?= $unContrat['nom']; ?></td>
		      		<td><?= $unContrat['siret']; ?></td>
		      		<td><?= $unContrat['tel']; ?></td>
		      		<td><?= $unContrat['email']; ?></td>
		      		<td><?= $unContrat['adresse']; ?> </td>
		      		<td><?= $unContrat['ville']; ?></td>
		      		<td><?= $unContrat['num_contrat']; ?></td>
					<td><?= $unContrat['date_souscription']; ?></td>
					<td><?= $unContrat['montant_mensuel_ht']; ?></td>
					<td><?= $unContrat['etat_du_contrat']; ?></td>
					<td><?= $unContrat['objet_du_contrat']; ?></td>
					<td class="hide">
                    <?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
                        <a href="index.php?page=2&action=edit&num_contrat=<?= $unContrat['num_contrat']; ?>" class="btn btn-primary me-2 container">Modifier</a>
                        <a href="index.php?page=2&action=sup&num_contrat=<?= $unContrat['num_contrat']; ?>" class="btn btn-danger mt-1 container ">Supprimer</a>
                    <?php } ?>
                        <a href="" name="download" value="download" onclick="window.print()" id="imprimer" class="btn btn-success mt-1 container">Télécharger</a>
                    </td>   
                </tr>
                <?php } ?>
              </tbody>
		</table>
	</div>
</div>

<style>
@media print
{
    .hide
    {
        display: none;
    }
}
</style>
