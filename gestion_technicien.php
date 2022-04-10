<div class="card rounded-pill sizecard3 mb-4">
    <div class=" card-header bg-white text-dark rounded-pill">
        <h2 class="text-center"> Gestion des techniciens </h2>
    </div>
</div>

<?php 

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin" || $_SESSION['role'] == "usert") {

	$leTechnicien = null;

	$unControleur->setTable("technicien");

	if (isset($_GET['action']) and isset($_GET['idtechnicien'])) {
		$idtechnicien = $_GET['idtechnicien'];
		$action = $_GET['action'];
		switch ($action) {
			case 'sup':
				if (isset($_SESSION['role']) == "admin")
                { 
					$where = array("idtechnicien"=>$idtechnicien);
					$unControleur->delete($where);
					break;
				}
			case 'edit':
				$where = array("idtechnicien"=>$idtechnicien);
				$leTechnicien = $unControleur->selectWhere($where);
				break;
		}
	}

	if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {
		require_once("vue/vue_insert_technicien.php");

		if (isset($_POST['Modifier'])) 
		{
			$unControleur-> setTable("technicien");
			$tab = array(
				//"idtechnicien"=>$_POST['idtechnicien'],
				"nom"=>$_POST['nom'],
				"prenom"=>$_POST['prenom'],
				"disponibilite"=>$_POST['disponibilite'],
				"tarif_horaire"=>$_POST['tarif_horaire'],
				"tel"=>$_POST['tel'],
				"email"=>$_POST['email'],
				"role"=>'usert',
				"mdp"=>$_POST['mdp']
			);
			$where = array("idtechnicien"=>$_GET['idtechnicien']);
			$unControleur->update($tab, $where);

			echo '<script language="javascript">document.location.replace("index.php?page=3");</script>';
			//header("Location: index.php?page=3");
		}
	}

	if (isset($_SESSION['email']) and $_SESSION['role'] == "usert")
	{
		if(isset($_GET['idtechnicien']))
        {
			require_once("vue/vue_insert_technicien.php");

			if (isset($_POST['Modifier']))
			{
				$unControleur-> setTable("technicien");
				$tab = array(
					//"idtechnicien"=>$_POST['idtechnicien'],
					"nom"=>$_POST['nom'],
					"prenom"=>$_POST['prenom'],
					"disponibilite"=>$_POST['disponibilite'],
					"tarif_horaire"=>$_POST['tarif_horaire'],
					"tel"=>$_POST['tel'],
					"email"=>$_POST['email'],
					"role"=>'usert',
					"mdp"=>$_POST['mdp']
				);
				$where = array("idtechnicien"=>$_GET['idtechnicien']);
				$unControleur->update($tab, $where);

				echo '<script language="javascript">document.location.replace("index.php?page=3");</script>';
			}
		}
	} 

	if (isset($_POST['Valider'])) {
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
	}

}

$unControleur->setTable("technicien");

if (isset($_POST['Rechercher'])) 
{
    $mot = $_POST['mot'];
    $tab = array("nom", "prenom", "disponibilite", "tarif_horaire", "tel", "email");
    $lesTechniciens = $unControleur->selectSearch($mot, $tab);
} 
else 
{

    if ($_SESSION['role'] == "admin" )
    {
        $lesTechniciens = $unControleur->selectAll();
    }
    else
    {
        $where=array('idtechnicien'=> $_SESSION['iduser']);
        $lesTechniciens []= $unControleur->selectWhere($where); //retourne un seul technicien
    }
    
}

require_once("vue/vue_les_techniciens.php");

?>