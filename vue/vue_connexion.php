<div class="container mt-4 mb-4 ">
	<div class="row d-flex justify-content-center">
		<div class="img card bg-dark text-light" style="max-width: 40rem;">
		<center>
		<img class="img mt-3" src="images/SOG.png">
		</center>
			
			<div class="card-body">
				<form method="post" action="">
					<div class="mb-3">
						<label for="email" class="form-label">Adresse email</label>
						<input type="email" name="email" id="email" class="form-control">
					</div>
					<div class="mb-5">
						<label for="motdepasse" class="form-label">Mot de passe</label>
						<input type="password" name="mdp" id="motdepasse" class="form-control">
					</div>
					<div class="d-flex justify-content-center">
						<button type="reset" class="btn btn-danger me-2">Annuler</button>
						<button type="submit" name="Connexion" class="btn btn-primary">Connexion</button>
					</div>
					<br>
					<div class="d-flex justify-content-center">
						<a href="gestion_mdp_oublie.php">Mot de passe oublié ?</a>
					</div>
					<br>
					<div class="d-flex justify-content-center">
					Pour s'incrire, sélectionner votre &nbsp; <strong>rôle</strong> &nbsp;  puis, cliquer sur le bouton &nbsp; <strong> "Inscription" </strong>
					</div>
					<br>

					<div class="row d-flex align-items-center justify-content-center">
						<div class=" col-md-3">
							<div class=" pos d-flex form-check">
								<input class="form-check-input" type="radio"  name="choice" value="client" id="radio1">
								<label class=" pos_label form-check-label" for="radio1">
									Client
								</label>
							</div>
							<div class=" pos d-flex form-check">
								<input class=" form-check-input" type="radio" name="choice" value="technicien" id="radio2">
								<label class=" pos_label form-check-label" for="radio2">
									Technicien
								</label>
							</div>
						</div>

						<div class="col-md-3 ">
							<button type="submit" name="inscription" class=" pos btn btn-success"> Inscription</button>
							
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

