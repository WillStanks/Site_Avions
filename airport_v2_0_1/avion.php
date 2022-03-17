<?php

require 'Modele/modele.php';

try {
  if (isset($_GET['id'])) {
    // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
    $id = intval($_GET['id']);
    if ($id != 0) {
      $avion = getAvion($id);
      $reservations = getReservations($id);
      require 'Vue/vueAvion.php';
    }
    else
      throw new Exception("Identifiant de l'avion incorrect");
  }
  else
    throw new Exception("Aucun identifiant de l'avion");
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vue/vueErreur.php';
}