<?php
// Renvoie la liste de tous les avions.
function getAvions(){
    
    $bdd = getBdd();
    // Récupération des 10 derniers avions
    $reponse = $bdd->query('SELECT * FROM avion');

    return $reponse;
}

function getAvion($idAvion){
    
    $bdd = getBdd();
    // Récupération des 10 derniers avions
    $avion = $bdd->prepare('SELECT * FROM avion WHERE idAvion = ?');
    $avion->execute(array($idAvion));

    if ($avion->rowCount() == 1)
        return $avion->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun avion ne correspond à l'identifiant '$idAvion'");
}

function getReservations($idAvion){
    $bdd = getBdd();

    $reservations = $bdd->prepare('SELECT * FROM donnees_reservations WHERE idAvion = ?');
    $reservations->execute(array($idAvion));

    return $reservations;
}


// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd(){
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airport_v0_0_1;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require 'Vue/vueErreur.php';
    }

    return $bdd;
}

// Permet d'ajouter un avion.
function setAvion($avion){
    $bdd = getBdd();

    // Insertion de l'avion à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO avion (idAvion, nom, autresDetails, nbreSieges) VALUES(?, ?, ?, ?)');
    $req->execute(array($avion['idAvion'], $avion['nom'], $avion['autresDetails'], $avion['nbreSieges']));
    
    return $req;
}

// Permet de supprimer un avion.
function deleteAvion($idAvion){
    $bdd = getBdd();

    // Suppression de l'avion à l'aide d'une requête préparée
    $req = $bdd->prepare('DELETE FROM avion WHERE idAvion = ?');
    $req->execute(array($idAvion));

    return $req;
}

// Permet de modifier un avion.
function modifAvion($avion){
    $bdd = getBdd();

    // Modification de l'avion à l'aide d'une requête préparée
    $req = $bdd->prepare('UPDATE avion SET nom = ?, autresDetails = ?, nbreSieges = ? WHERE idAvion = ?');
    $req->execute(array($avion['nom'], $avion['autresDetails'], $avion['nbreSieges'], $avion['idAvion']));

    return $req;
}

function setReservation($reservation){
    $bdd = getBdd();

    $result = $bdd->prepare('INSERT INTO donnees_reservations (idDonnee, idAvion, idAeroport, idUtilisateur) VALUES(?, ?, ?, ?)');
    $result->execute(array($reservation['idDonnee'], $reservation['idAvion'], $reservation['idAeroport'], $reservation['idUtilisateur']));

    return $result;
}
