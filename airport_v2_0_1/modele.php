<?php
// Renvoie la liste de tous les avions.
function getAvions(){
    
    $bdd = getBdd();
    // Récupération des 10 derniers avions
    $reponse = $bdd->query('SELECT * FROM avion');

    return $reponse;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd(){
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airport_v0_0_1;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require 'vueErreur.php';
    }

    return $bdd;
}