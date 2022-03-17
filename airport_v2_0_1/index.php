

<?php

require 'Modele/modele.php';

try{
    $reponse = getAvions();
    // Affichage
    require 'Vue/vueAccueil.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'Vue/vueErreur.php';
}

