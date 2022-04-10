<div class="card rounded-pill sizecard4 mb-4">
    <div class=" card-header bg-white text-dark rounded-pill">
        <h2 class="text-center"> Gestion des plannings </h2>
    </div>
</div>

<?php

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {

    $lePlanning = null;

    $unControleur->setTable("vlesPlannings");

    if (isset($_GET['action']) and isset($_GET['idtechnicien']) and isset($_GET['num_intervention']) 
    and isset($_GET['date_heure_debut']))
    {
        $idtechnicien = $_GET['idtechnicien'];
        $num_intervention = $_GET['num_intervention'];
        $date_heure_debut = $_GET['date_heure_debut'];
        $action = $_GET['action'];
        
        switch($action)
        {
            case "sup":
                $where = array('idtechnicien'=>$idtechnicien, 
                'num_intervention'=>$num_intervention, 
                'date_heure_debut'=>$date_heure_debut);
                $unControleur->setTable("planning");
                $unControleur->delete($where);
            break;

            case "edit":
                $where = array('idtechnicien'=>$idtechnicien, 
                'num_intervention'=>$num_intervention, 
                'date_heure_debut'=>$date_heure_debut);

                $lePlanning = $unControleur->selectWhere($where);
            break;
        }
    }

    require_once("vue/vue_insert_planning.php");

    if (isset($_POST['Modifier'])) {
        
        $unControleur->setTable("planning");
        $tab = array(
            "idtechnicien"=>$_POST['idtechnicien'],
            "num_intervention"=>$_POST['num_intervention'],
            "date_heure_debut"=>$_POST['date_heure_debut'],
            "date_heure_fin"=>$_POST['date_heure_fin']
        );
        
        $where = array('idtechnicien'=>$idtechnicien,
            'num_intervention'=>$num_intervention,
            'date_heure_debut'=>$date_heure_debut
        );
        /*var_dump($tab);
        var_dump($where);*/

        $unControleur->updateplanning($tab, $where);
        echo '<script language="javascript">document.location.replace("index.php?page=5");</script>';
    }

    if (isset($_POST['Valider']))
    {
        $unControleur->setTable("planning");
        $tab = array(
            "idtechnicien"=>$_POST['idtechnicien'],
            "num_intervention"=>$_POST['num_intervention'],
            "date_heure_debut"=>$_POST['date_heure_debut'],
            "date_heure_fin"=>$_POST['date_heure_fin']
        );
        $unControleur->insertnonull($tab);
    }

}

    $unControleur->setTable("vlesPlannings");

    if (isset($_POST['Rechercher']))
    {
        $mot = $_POST['mot'];
        $tab = array("idtechnicien","num_intervention","nom", "prenom", "date_heure_debut","date_heure_fin");

        $lesPlannings = $unControleur->selectSearch($mot, $tab);
    } else {
        $lesPlannings = $unControleur->selectAll();
    }


    require_once("vue/vue_les_plannings.php");

?>