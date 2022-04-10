<div class="card rounded-pill sizecard mb-4">
    <div class=" card-header bg-white text-dark rounded-pill">
        <h2 class="text-center"> Gestion des clients </h2>
    </div>
</div>

<?php

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin" || $_SESSION['role'] == "userc") {

    $leClient = null;

    $unControleur->setTable("client");

    if (isset($_GET['action']) and isset($_GET['idclient'])) 
    {
        $idclient = $_GET['idclient'];
        $action = $_GET['action'];
        switch ($action) 
        {
            case 'sup': 
                if (isset($_SESSION['role']) == "admin")
                {
                    $where = array("idclient"=>$idclient);
                    $unControleur->delete($where);
                    break;
                }
            case 'edit':
                $where = array("idclient"=>$idclient);
                $leClient = $unControleur->selectWhere($where);
                break;
        }
    }

    if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {
        require_once("vue/vue_insert_client.php");

        if (isset($_POST['Modifier'])) 
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
            $where = array("idclient"=>$_GET['idclient']);
            $unControleur->update($tab, $where);

            echo '<script language="javascript">document.location.replace("index.php?page=1");</script>';
        }
    }

    if (isset($_SESSION['email']) and $_SESSION['role'] == "userc") 
    {
        if(isset($_GET['idclient']))
        {
            require_once("vue/vue_insert_client.php");

            if (isset($_POST['Modifier'])) 
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
                $where = array("idclient"=>$_GET['idclient']);
                $unControleur->update($tab, $where);

                echo '<script language="javascript">document.location.replace("index.php?page=1");</script>';
            }
        }
    }
        
    if (isset($_POST['Valider'])) {
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
    }

}

$unControleur->setTable("client");

if (isset($_POST['Rechercher'])) 
{
    $mot = $_POST['mot'];
    $tab = array("nom", "siret", "tel", "email", "adresse", "ville");
    $lesClients = $unControleur->selectSearch($mot, $tab);
} 
else 
{

    if ($_SESSION['role'] == "admin" )
    {
        $lesClients = $unControleur->selectAll();
    }
    else
    {
        $where=array('idclient'=> $_SESSION['iduser']);
        $lesClients []= $unControleur->selectWhere($where); //retourne un seul client
    }
    
}

require_once("vue/vue_les_clients.php");

?>