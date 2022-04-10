<div class="card rounded-pill sizecard mb-4 hide">
    <div class=" card-header bg-white text-dark rounded-pill">
        <h2 class="text-center"> Gestion des contrats </h2>
    </div>
</div>

<?php

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {

    $leContrat = null;

    $unControleur->setTable("vlesContrats");

	if (isset($_GET['action']) and isset($_GET['num_contrat']))
	{
		$num_contrat = $_GET['num_contrat'];
		$action = $_GET['action'];
		switch($action)
		{
			case "sup":
                $where = array('num_contrat'=>$num_contrat);
				$unControleur->setTable("contrat");
                $unControleur->delete($where);
                break;
			case "edit":
                $where = array("num_contrat"=>$num_contrat);
				$leContrat = $unControleur->selectWhere($where);
			break;
		}
	}


	require_once("vue/vue_insert_contrat.php");

    if (isset($_POST['Modifier'])) {
		$unControleur->setTable("contrat");
		$tab = array(
			"idclient"=>$_POST['idclient'],
			"date_souscription"=>$_POST['date_souscription'],
			"montant_mensuel_ht"=>$_POST['montant_mensuel_ht'],
			"etat_du_contrat"=>$_POST['etat_du_contrat'],
			"objet_du_contrat"=>$_POST['objet_du_contrat']
		);
		$where = array("num_contrat"=>$_GET['num_contrat']);
		$unControleur->update($tab, $where);
		echo '<script language="javascript">document.location.replace("index.php?page=2");</script>';
	}

	if (isset($_POST['Valider']))
	{
		$unControleur->setTable("contrat");
		$tab = array(
                    "idclient" =>$_POST['idclient'],
					"date_souscription" =>$_POST['date_souscription'],
					"montant_mensuel_ht" =>$_POST['montant_mensuel_ht'],
					"etat_du_contrat" =>$_POST['etat_du_contrat'],
					"objet_du_contrat"=>$_POST['objet_du_contrat'],
		);
		$unControleur->insert($tab);
	}

}

    $unControleur->setTable("vlesContrats");

	if (isset($_POST['Rechercher']))
    {
        $mot = $_POST['mot'];
        $tab = array("nom","prenom","tel","email","adresse","ville","date_souscription", "montant_mensuel_ht", "etat_du_contrat", "objet_du_contrat");

        $lesContrats = $unControleur->selectSearch($mot, $tab);
    } 
    else 
    {
        if ($_SESSION['role'] == "admin" )
        {
            $lesContrats = $unControleur->selectAll();
        }
        else
        {
            $where=array('idclient'=> $_SESSION['iduser']);
            $lesContrats [] = $unControleur->selectWhere($where); //retourne un seul contrat pour le client en cour
        }
    }

	require_once("vue/vue_les_contrats.php");

?>