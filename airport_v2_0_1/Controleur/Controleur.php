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

// Fait l'ajout sur le formulaire.
function nouveauAvion()
{
    require "Vue/vueAjouterAvion.php";
}

// Fait l'ajout en SQL.
function insertAvion($avion)
{
    setAvion($avion);
    // Redirection du visiteur vers la page d'accueil
    header('Location: index.php');
}

// Fait la suppression en SQL.
function supprimerAvion($idAvion)
{
    deleteAvion($idAvion);

    header('Location: index.php');
}

// Fait la suppression sur le formulaire.
function confirmerSupp($idAvion)
{
    $donnees = getAvion($idAvion);
    require "Vue/vueSupprimer.php";
}

// Fait la modification en SQL.
function modifierAvion($avion)
{
    modifAvion($avion);

    header('Location: index.php');
}

// Fait la modification sur le formulaire.
function confirmerModif($idAvion)
{
    $donnees = getAvion($idAvion);
    require "Vue/vueModification.php";
}

function insertReserv($reservation)
{
    // vérifier si l'avion existe existe;
    $avion = getAvion($reservation['idAvion']);
    setReservation($reservation);

    header('Location: index.php?action=avion&id=' . $reservation['idAvion']);
}

function nouvelleReserv($idAvion)
{
    require "Vue/vueAjouterReservation.php";
}

// Affiche une erreur
function erreur($msgErreur)
{
    require 'Vue/vueErreur.php';
}
