
<div class="d-flex justify-content-center mt-4 mb-3">
    <?php require_once("vue/vue_les_stats_generale.php"); ?>
</div>

<div class="d-flex justify-content-center mt-4 mb-3">
    <?php 
    $unControleur->setTable('vlesNbContrats');
    $lesContrats = $unControleur->selectAll(); 
    
    ?>
</div>



<?php require_once('vue/vue_les_stats_contrats.php'); ?>

<div class="d-flex justify-content-center mt-4 mb-3">
    <?php 
    $unControleur->setTable('vlesNbInterventions');
    $lesPlannings = $unControleur->selectAll(); 
    
    ?>
</div>
<?php require_once('vue/vue_les_stats_interventions.php'); ?>