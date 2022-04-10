<?php 

	$unControleur->setTable("client");
	$nbClients = $unControleur->count();

	$unControleur->setTable("technicien");
	$nbTechniciens = $unControleur->count();

	$unControleur->setTable("contrat");
	$nbContrats = $unControleur->count();

	$unControleur->setTable("intervention");
	$nbInterventions = $unControleur->count();

	$unControleur->setTable("planning");
	$nbPlannings = $unControleur->count();

?>

<div class="card">
	<div class="card-header">
		<h3 class="text-center">Nombre de contrats par client</h3>
	</div>
	<div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
		  	<thead>
		    	<tr>
		      		<th scope="col">Nombre de clients</th>
		      		<th scope="col">Nombre de techniciens </td>
					<th scope="col">Nombre de contrats</th>
		      		<th scope="col">Nombre d'interventions </td>
					<th scope="col">Nombre de plannings </td>
		    	</tr>
		  	</thead>
		  	<tbody>
		    	<tr>
					<td> <?= $nbClients['nb'] ?> </td>
					<td> <?= $nbTechniciens['nb'] ?> </td>
					<td> <?= $nbContrats['nb'] ?> </td> 
					<td> <?= $nbInterventions['nb'] ?> </td>
					<td> <?= $nbPlannings['nb'] ?> </td>
		    	</tr>	
		  	</tbody>
		</table>
	</div>
</div>
