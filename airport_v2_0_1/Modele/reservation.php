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

    // Renvoie informations sur un avion.
    function getReservation($idReserv)
    {
        $sql = 'SELECT * FROM donnees_reservations WHERE idDonnee = ?';
        $reservation = $this->executerRequete($sql, [$idReserv]);

        if ($reservation->rowCount() == 1)
            return $reservation->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun avion ne correspond à l'identifiant '$idReserv'");
    }

    function setReservation($reservation)
    {
        var_dump($reservation);
        $sql = 'INSERT INTO donnees_reservations (idDonnee, idAvion, idAeroport, idUtilisateur, courriel) VALUES(?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$reservation['idDonnee'], $reservation['idAvion'], $reservation['idAeroport'], $reservation['idUtilisateur'], $reservation['courriel']]);

        return $result;
    }

    // Permet de modifier une réservation.
    function modifReserv($reservation)
    {
        // Modification de la réservation à l'aide d'une requête préparée
        $sql = 'UPDATE donnees_reservations SET idAvion = ?, idAeroport = ?, idUtilisateur = ?, courriel = ? WHERE idDonnee = ?';
        $req = $this->executerRequete($sql, [$reservation['idAvion'], $reservation['idAeroport'], $reservation['idUtilisateur'], $reservation['courriel'], $reservation['idDonnee']]);

        return $req;
    }

    // Permet de compter le nombre de reserv.
    public function getNombreReserv()
    {
        $sql = 'select count(*) as nbReserv from donnees_reservations';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbReserv'];
    }

    // Permet de compter le nombre de reserv dans un avion.
    public function getNombreReservAvion($idAvion)
    {
        $sql = 'select count(*) as nbReserv from donnees_reservations WHERE idAvion = ?';
        $resultat = $this->executerRequete($sql, [$idAvion]);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbReserv'];
    }
}
