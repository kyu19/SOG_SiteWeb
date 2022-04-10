<?php session_start();
require_once("controleur/config_bdd.php");
require_once("controleur/controleur.class.php");

$password = '/(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])/'; //Regex mdp
$mail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; //Regex email
$name = '/^[^@&"()!_$*€£`+=\/;?#]+$/'; // Regex nom & prenom

$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SOG - Maintenance informatique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</head>
<body>

<?php 
	if (!isset($_SESSION['email'])) 
	{
		require_once("vue/vue_connexion.php");
	}

	if (isset($_POST['inscription']))
	{
		if(isset($_POST['choice']) && $_POST['choice'] == "client")
		{
			require_once("vue/vue_inscription_client.php");
		}

		else if ((isset($_POST['choice']) && $_POST['choice'] == "technicien"))
		{
			require_once("vue/vue_confirmation_technicien.php");
		}

		else
		{
			/*echo 
			'<div class="sizecard6 alert alert-danger text-center align-top" role="alert"> Veuillez sélectionner votre rôle </div>';*/
			echo '<script> swal("Erreur de sélection", "Veuillez sélectionner votre rôle", "warning"); </script>';
			
		}

	}

	if(isset($_POST['confirmer']))
	{
		if((isset($_POST['motcle']) && $_POST['motcle'] == "@SOGinscription2022")) 
		{
			require_once("vue/vue_inscription_technicien.php");
		}
	}

	if (isset($_POST['ValiderTechnicien'])) 
	{

		$unControleur->setTable("user");

		$mot = $_POST['email'];
		$tab = array("email");
		$lesTechniciens = $unControleur->selectSearch($mot, $tab);

		if($lesTechniciens != null && !empty($lesTechniciens))
		{
			/*echo '<div class="sizecard6 alert alert-danger text-center align-top" role="alert"> Compte déjà existant, veuillez renseigner une autre adresse email </div>';*/
			echo '<script> swal("Compte déjà existant", "Veuillez renseigner une autre adresse email", "warning"); </script>';
		}

		else
		{
			if (preg_match($name,$_POST['nom']) and preg_match($name,$_POST['prenom']) and preg_match($mail, $_POST['email'])
				and preg_match($password, $_POST['mdp']))
			{
				$unControleur-> setTable("technicien");
				$tab = array(				
					"nom"=>$_POST['nom'],
					"prenom"=>$_POST['prenom'],
					"disponibilite"=>$_POST['disponibilite'],
					"tarif_horaire"=>$_POST['tarif_horaire'],
					"tel"=>$_POST['tel'],
					"email"=>$_POST['email'],
					"role"=>'usert',
					"mdp"=>$_POST['mdp']
				);
				$unControleur->insert($tab);
				/*echo 
				'<div class=" sizecard6 alert alert-success text-center" role="alert">Votre inscription a bien été pris en compte </div>';*/
				echo '<script> swal("Félicitation", "Votre inscription a bien été pris en compte", "success"); </script>';
			}
			else
			{
				/*echo 
				'<div class="sizecard6 alert alert-danger text-center align-top" role="alert"> L\'inscription a échouée <br> Critères de nom ou de mot de passe non respecté </div>';*/
				echo '<script> swal("Erreur d\'inscription", "L\'inscription a échouée Critères de nom ou de mot de passe non respecté", "error"); </script>';
			}
		}

	}

	if (isset($_POST['ValiderClient'])) 
	{

		$unControleur->setTable("user");

		$mot = $_POST['email'];
		$tab = array("email");
		$lesClients = $unControleur->selectSearch($mot, $tab);

		if($lesClients != null && !empty($lesClients))
		{
			/*echo '<div class="sizecard6 alert alert-danger text-center align-top" role="alert"> Compte déjà existant, veuillez renseigner une autre adresse email </div>';*/
			echo '<script> swal("Compte déjà existant", "Veuillez renseigner une autre adresse email", "warning"); </script>';
		}
		else
		{
			if (preg_match($name,$_POST['nom']) and preg_match($mail, $_POST['email'])
				and preg_match($password, $_POST['mdp']))
			{
				$unControleur->setTable("client");
				$tab = array(
					"nom"=>$_POST['nom'],
					"siret"=>$_POST['siret'],
					"tel"=>$_POST['tel'],
					"email"=>$_POST['email'],
					"adresse"=>$_POST['adresse'],
					"CP"=>$_POST['CP'],
					"ville"=>$_POST['ville'],
					"role"=>'userc',
					"mdp"=>$_POST['mdp']
				);
				$unControleur->insert($tab);
				/*echo 
				'<div class=" sizecard6 alert alert-success text-center" role="alert">Votre inscription a bien été pris en compte </div>';*/
				echo '<script> swal("Félicitation", "Votre inscription a bien été pris en compte", "success"); </script>';
			}
			else
			{
				/*echo 
				'<div class="sizecard6 alert alert-danger text-center align-top" role="alert"> L\'inscription a échouée <br> Critères de nom ou de mot de passe non respecté </div>';*/
				echo '<script> swal("Erreur d\'inscription", "L\'inscription a échouée Critères de nom ou de mot de passe non respecté", "error"); </script>';
			}
		}
		
	}
	

	if (isset($_POST['Connexion'])) 
	{
		$email = $_POST['email'];
		$mdp = sha1($_POST['mdp']);
		$where = array("email"=>$email, "mdp"=>$mdp);
		$unControleur->setTable("user");
		$unUser = $unControleur->selectWhere($where);
		if (isset($unUser['email'])) 
		{
			$_SESSION['email'] = $unUser['email'];
			$_SESSION['nom'] = $unUser['nom'];
			$_SESSION['prenom'] = $unUser['prenom'];
			$_SESSION['role'] = $unUser['role'];
			$_SESSION['iduser'] = $unUser['iduser'];
			header('Location: /GestionIntervention/');
		}
		else
		{
			/*echo 
			'<div class="sizecard6 alert alert-danger text-center align-top" role="alert"> Veuillez vérifier vos identifiants </div>';*/
			echo '<script> swal("Une erreur est survenue", "Veuillez vérifier vos identifiants", "warning"); </script>';
		}
	}


	if (isset($_SESSION['email'])) 
	{
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark hide">
  	<div class="container-fluid">
    	<a class="navbar-brand" href="/GestionIntervention/">Société SOG</a>
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        		<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=0">
          				<img src="images/home.png" width="50" height="47">
          			</a>
        		</li>

				<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "userc" || $_SESSION['role'] == "admin" ) { ?>
        		<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=1">
          				<img src="images/client.png" width="50" height="50">
          			</a>
        		</li>
				
				<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=2">
          				<img src="images/contrat.png" width="50" height="50">
          			</a>
        		</li>
				<?php } ?>

				<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "usert" || $_SESSION['role'] == "admin") { ?>
        		<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=3">
          				<img src="images/technicienn.png" width="50" height="50">
          			</a>
        		</li>

        		<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=4">
          				<img src="images/intervention.png" width="50" height="50">
          			</a>
        		</li>
    
        		<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=5">
          				<img src="images/planning.png" width="50" height="50">
          			</a>
        		</li>
        		<?php } ?>

				<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
				<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=6">
          				<img src="images/stats.png" width="50" height="50">
          			</a>
        		</li>
				<?php } ?>

				<li class="nav-item">
          			<a class="image nav-link active me-2" aria-current="page" href="index.php?page=7">
          				<img src="images/contact.png" width="50" height="50">
          			</a>
        		</li>

      		</ul>
      		<div class="badge bg-white text-dark  me-3">
      			~ <?= $_SESSION['email']; ?> ~
      		</div>
      		<a href="index.php?page=8" class="btn btn-danger">Déconnexion</a>
    	</div>
  	</div>
</nav>


<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<?php
				if (isset($_GET['page'])) 
				{
					$page = $_GET['page'];
				} else 
				{
					$page = 0;
				}

				switch ($page) 
				{
					case 0 : require_once("home.php"); break;
					case 1 : require_once("gestion_client.php"); break;
					case 2 : require_once("gestion_contrat.php"); break;
					case 3 : require_once("gestion_technicien.php"); break;
					case 4 : require_once("gestion_intervention.php"); break;
					case 5 : require_once("gestion_planning.php"); break;
					case 6 : require_once("gestion_stats.php"); break;
					case 7 : require_once("gestion_contact.php"); break;
					case 8 : 
						unset($_SESSION);
						session_destroy();
						header('Location: /GestionIntervention/');
						break;
				}
			?>
		</div>
	</div>
</div>

<?php } ?>

<?php if(isset($_SESSION['email'])) { ?>

<footer class="w-100 py-4 flex-shrink-0 mt-5 hide">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white">SOG.</h5>
                    <p class="txt small">Solution de gestion et maintenance de parc informatique</p>
                    <p class="txt small mb-0">&copy; Copyrights. All rights reserved.</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Liens rapide</h5>
                    <ul class="list-unstyled text-muted">
					<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "userc" || $_SESSION['role'] == "admin" ) { ?>
                        <li><a class="txt" href="index.php?page=1">Gestion clients</a></li>
                        <li><a class="txt" href="index.php?page=2">Gestion contrats</a></li>
					<?php } ?>
					<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "usert" || $_SESSION['role'] == "admin" ) { ?>
						<li><a class="txt" href="index.php?page=3">Gestion techniciens</a></li>
                        <li><a class="txt" href="index.php?page=4">Gestion interventions</a></li>
						<li><a class="txt" href="index.php?page=5">Gestion plannings</a></li>
					<?php } ?>
                    </ul>
                </div>

				<div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Liens utile</h5>
                    <ul class="list-unstyled text-muted">
						<li><a class="txt" href="index.php?page=0">Home</a></li>
						<li><a class="txt" href="index.php?page=7">Contact</a></li>
					<?php if (isset($_SESSION['email']) and  $_SESSION['role'] == "admin" ) { ?>
						<li><a class="txt" href="index.php?page=6">Statistiques</a></li>
					<?php } ?>
                    </ul>
                </div>
               
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-3">Informations</h5>
                    <p class="txt small">Pour tout renseignement, n'hésitez pas à prendre contact avec nous via le formulaire ou bien directement via nos coordonnées</p>
					<p class="txt small"><i class="fa-solid fa-house mr-3"></i> 9 rue Aminches 92300, Montrouge </p>
					<p class="txt small"><i class="fa fa-phone mr-3"></i> +33 6 50 40 93 99</p>
					<p class="txt small"><i class="fa fa-envelope-o mr-3"></i> sog.inform@gmail.com </p>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php  } ?>

<style>
/*css des lien a*/
a {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

.txt {
	color: lightgray;
}

a:hover, a:focus {
  text-decoration: none;
}

.h1
{
	margin-top: -2%!important;
}

body {

	background: #642B73;

	background: -webkit-linear-gradient(to right, #7DE2FC, #B9B6E5);

	background: linear-gradient(to right, #7DE2FC , #B9B6E5);
    /*background-image: linear-gradient(-225deg, #7DE2FC 0%, #B9B6E5 100%);*/

}

</style>


<script src="https://kit.fontawesome.com/371c02c949.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>