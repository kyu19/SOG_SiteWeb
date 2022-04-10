<div class="card">
	<div class="card-header">
		<h3 class="text-center">Nombre de contrats par client</h3>
	</div>
	<div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
		  	<thead>
		    	<tr>
		      		<th scope="col">idclient</th>
		      		<th scope="col">Nom Client</td>
		      		
		      		<th scope="col">Nb Contrat</th>
				
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($lesContrats as $unContrat) { ?>
		    	<tr>
		      		<td><?= $unContrat['idclient']; ?></td>
		      		<td><?= $unContrat['nom']; ?></td>
		      		
		      		<td><?= $unContrat['nb_contrat']; ?></td>

		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
	</div>
</div>
