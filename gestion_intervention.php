<div class="card rounded-pill sizecard2 mb-4">
    <div class=" card-header bg-white text-dark rounded-pill">
        <h2 class="text-center"> Gestion des interventions </h2>
    </div>
</div>

<?php

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {

    $leIntervention = null;

    $unControleur->setTable("vlesInterventions");

    $unControleur->setTable("intervention");

    if (isset($_GET['action']) and isset($_GET['num_intervention']))
    {
        $num_intervention = $_GET['num_intervention'];
        $action = $_GET['action'];
        switch($action)
        {
            case "sup":
                $where = array('num_intervention'=>$num_intervention);
                $unControleur->setTable("intervention");
                $unControleur->delete($where);
                break;
            case "edit":
                $where = array("num_intervention"=>$num_intervention);
                $leIntervention = $unControleur->selectWhere($where);
            break;
        }
    }

    require_once("vue/vue_insert_intervention.php");

    if (isset($_POST['Modifier'])) {
        $unControleur->setTable("intervention");
        $tab = array( 
            "num_contrat"=>$_POST['num_contrat'],
            "date_heure_affectation"=>$_POST['date_heure_affectation'],
            "etat_intervention"=>$_POST['etat_intervention']
        );
        $where = array("num_intervention"=> $_GET['num_intervention']);
        $unControleur->update($tab, $where);
        echo '<script language="javascript">document.location.replace("index.php?page=4");</script>';
    }

    if (isset($_POST['Valider']))
    {
        $unControleur->setTable("intervention");
        $tab = array(                    
                    "num_contrat"=>$_POST['num_contrat'],
                    "date_heure_affectation"=>$_POST['date_heure_affectation'],
                    "etat_intervention"=>$_POST['etat_intervention']
        );
        $unControleur->insert($tab);
    }

}

    $unControleur->setTable("vlesInterventionsContrats");

    if (isset($_POST['Rechercher']))
    {
        $mot = $_POST['mot'];
        $tab = array("num_intervention","num_contrat", "date_souscription", "montant_mensuel_ht",
        "etat_du_contrat","date_heure_affectation","etat_intervention");

        $lesInterventions = $unControleur->selectSearch($mot, $tab);
    } else {
        $lesInterventions = $unControleur->selectAll();
    }


    require_once("vue/vue_les_interventions.php");

?>