<?php

require_once 'Modele/modele.php';

class avion extends modele
{

    // Renvoie la liste de tous les avions.
    function getAvions()
    {
        $sql = 'SELECT * FROM avion';
        $reponse = $this->executerRequete($sql);

        return $reponse;
    }

    // Renvoie informations sur un avion.
    function getAvion($idAvion)
    {
        $sql = 'SELECT * FROM avion WHERE idAvion = ?';
        $avion = $this->executerRequete($sql);

        if ($avion->rowCount() == 1)
            return $avion->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun avion ne correspond à l'identifiant '$idAvion'");
    }


    // Permet d'ajouter un avion.
    function setAvion($avion)
    {
        // Insertion de l'avion à l'aide d'une requête préparée
        $sql = 'INSERT INTO avion (nom, autresDetails, nbreSieges, urlModele) VALUES(?, ?, ?, ?)';
        $req = $this->executerRequete($sql, array($avion));

        return $req;
    }

    // Permet de supprimer un avion.
    function deleteAvion($idAvion)
    {
        // Suppression de l'avion à l'aide d'une requête préparée
        $sql = 'DELETE FROM avion WHERE idAvion = ?';
        $avion = $this->executerRequete($sql, array($idAvion));

        return $avion;
    }

    // Permet de modifier un avion.
    function modifAvion($avion)
    {
        // Modification de l'avion à l'aide d'une requête préparée
        $sql = 'UPDATE avion SET nom = ?, autresDetails = ?, nbreSieges = ?, urlModele = ? WHERE idAvion = ?';
        $req = $this->executerRequete($sql, array($avion));

        return $req;
    }
}
