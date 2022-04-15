<?php

require_once 'Modele/modele.php';

class reservation extends modele
{

    function getReservations($idAvion)
    {
        $sql = 'SELECT * FROM donnees_reservations WHERE idAvion = ?';
        $reservations = $this->executerRequete($sql, array($idAvion));

        return $reservations;
    }

    function setReservation($reservation)
    {
        $sql = 'INSERT INTO donnees_reservations (idDonnee, idAvion, idAeroport, idUtilisateur, courriel) VALUES(?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, array($reservation));

        return $result;
    }
}
