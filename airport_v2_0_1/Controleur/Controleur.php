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
function nouveauAvion($erreur)
{
    require "Vue/vueAjouterAvion.php";
}

// Fait l'ajout en SQL.
function insertAvion($avion)
{
    $dataAvion = $_POST;

    $validation_url = filter_var($dataAvion['urlModele'], FILTER_VALIDATE_URL);
    if($validation_url){
        setAvion($avion);
        // Redirection du visiteur vers la page d'accueil
        header('Location: index.php');
    } else {
        // Recharge la page avec une erreur de URL.
        header('Location: index.php?action=nouveauAvion' . '&erreur=urlModele');
    }
   
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
    $dataAvion = $_POST;

    $validation_url = filter_var($dataAvion['urlModele'], FILTER_VALIDATE_URL);
    if($validation_url){
        modifAvion($avion);
        // Redirection du visiteur vers la page d'accueil
        header('Location: index.php');
    } else {
        // Recharge la page avec une erreur de URL.
        header('Location: index.php?action=confirmerModif&id=' . $dataAvion['idAvion'] . '&erreur=urlModele');
    }
    
}

// Fait la modification sur le formulaire.
function confirmerModif($idAvion, $erreur)
{
    $donnees = getAvion($idAvion);
    require "Vue/vueModification.php";
}

function insertReserv($reservation)
{
    // Vérifier si l'avion existe existe;
    $avion = getAvion($reservation['idAvion']);
    // Récupérer les données du formulaire
    $dataReserv = $_POST;
    $validation_courriel = filter_var($dataReserv['courriel'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {
        setReservation($reservation);
        header('Location: index.php?action=avion&id=' . $reservation['idAvion']);
    } else {
        // Recharge la page avec une erreur de courriel
        header('Location: index.php?action=nouvelleReserv&idAvion=' . $dataReserv['idAvion'] . '&erreur=courriel');
    }
}

function nouvelleReserv($idAvion, $erreur)
{
    require "Vue/vueAjouterReservation.php";
}

function quelsTypes($term){
    echo searchType($term);
}

function aPropos(){
    require "Vue/a_propos.php";
}

// Affiche une erreur
function erreur($msgErreur)
{
    require 'Vue/vueErreur.php';
}
