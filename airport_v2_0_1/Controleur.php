<?php

require 'Modele/modele.php';

// Affiche la liste de tous les avions
function accueil()
{
    $avions = getAvions();
    require 'Vue/vueAccueil.php';
}

// Affiche les réservations d'un avion.
function avion($idAvion)
{
    $avion = getAvion($idAvion);
    $reservations = getReservations($idAvion);
    require 'Vue/vueAvion.php';
}

// Affiche une erreur
function erreur($msgErreur)
{
    require 'Vue/vueErreur.php';
}
