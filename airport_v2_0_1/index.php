

<?php

require 'modele.php';

try{
    $reponse = getAvions();
    // Affichage
    require 'vueAvion.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}

