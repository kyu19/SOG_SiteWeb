<div class="card">
	<div class="card-header">
		<h3 class="text-center">Nombre d'interventions par technicien</h3>
	</div>
	<div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
		  	<thead>
		    	<tr>
		      		<th scope="col">Id technicien</th>
		      		<th scope="col">Nom technicien</td>
		      		<th scope="col">Prenom technicien</td>
		      		<th scope="col">Nb Contrat</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($lesPlannings as $unPlanning) { ?>
		    	<tr>
		      		<td><?= $unPlanning['idtechnicien']; ?></td>
		      		<td><?= $unPlanning['nom']; ?></td>
		      		<td><?= $unPlanning['prenom']; ?></td>
		      		<td><?= $unPlanning['nb_intervention']; ?></td>

		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
	</div>
</div>
