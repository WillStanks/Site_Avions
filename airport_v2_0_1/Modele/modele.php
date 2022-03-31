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
        $bdd = new PDO('mysql:host=localhost;dbname=airport_v2_1_3;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
    $req = $bdd->prepare('INSERT INTO avion (nom, autresDetails, nbreSieges, urlModele) VALUES(?, ?, ?, ?)');
    $req->execute(array($avion['nom'], $avion['autresDetails'], $avion['nbreSieges'], $avion['urlModele']));
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
    $req = $bdd->prepare('UPDATE avion SET nom = ?, autresDetails = ?, nbreSieges = ?, urlModele = ? WHERE idAvion = ?');
    $req->execute(array($avion['nom'], $avion['autresDetails'], $avion['nbreSieges'], $avion['urlModele'], $avion['idAvion']));

    return $req;
}

function setReservation($reservation){
    $bdd = getBdd();

    $result = $bdd->prepare('INSERT INTO donnees_reservations (idDonnee, idAvion, idAeroport, idUtilisateur, courriel) VALUES(?, ?, ?, ?, ?)');
    $result->execute(array($reservation['idDonnee'], $reservation['idAvion'], $reservation['idAeroport'], $reservation['idUtilisateur'], $reservation['courriel']));

    return $result;
}

function searchType($term){
    $bdd = getBdd();
    $stmt = $bdd->prepare('SELECT nomAvion FROM types_avion WHERE nomAvion LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()){
        $return_arr[] = $row['nomAvion'];
    }

    return json_encode($return_arr);
}
