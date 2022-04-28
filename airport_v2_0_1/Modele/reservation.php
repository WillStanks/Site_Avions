<?php

require_once 'Framework/modele.php';

class Reservation extends modele
{

    function getReservations($idAvion = NULL)
    {
        $sql = 'SELECT * FROM donnees_reservations WHERE idAvion = ?';
        $reservations = $this->executerRequete($sql, array($idAvion));

        return $reservations;
    }

    function setReservation($reservation)
    {
        var_dump($reservation);
        $sql = 'INSERT INTO donnees_reservations (idDonnee, idAvion, idAeroport, idUtilisateur, courriel) VALUES(?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$reservation['idDonnee'], $reservation['idAvion'], $reservation['idAeroport'], $reservation['idUtilisateur'], $reservation['courriel']]);

        return $result;
    }
}
