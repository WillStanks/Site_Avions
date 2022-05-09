<?php

require_once 'Framework/modele.php';

class Avion extends modele
{

    // Renvoie la liste de tous les avions.
    public function getAvions()
    {
        $sql = 'SELECT * FROM avion';
        $reponse = $this->executerRequete($sql);

        return $reponse;
    }

    // Renvoie informations sur un avion.
    function getAvion($idAvion)
    {
        $sql = 'SELECT * FROM avion WHERE idAvion = ?';
        $avion = $this->executerRequete($sql, [$idAvion]);

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
        $req = $this->executerRequete($sql, [$avion['nom'], $avion['autresDetails'], $avion['nbreSieges'], $avion['urlModele']]);

        return $req;
    }

    // Permet d'effacer un avion.
    function deleteAvion($idAvion)
    {
        $sql = 'UPDATE avion'
            . ' SET efface = 1'
            . ' WHERE idAvion = ?';
        $result = $this->executerRequete($sql, [$idAvion]);
        return $result;
    }

    // Réactive un un avion
    public function restoreAvion($idAvion)
    {
        $sql = 'UPDATE avion'
            . ' SET efface = 0'
            . ' WHERE idAvion = ?';
        $result = $this->executerRequete($sql, [$idAvion]);
        return $result;
    }

    // Permet de modifier un avion.
    function modifAvion($avion)
    {
        // Modification de l'avion à l'aide d'une requête préparée
        $sql = 'UPDATE avion SET nom = ?, autresDetails = ?, nbreSieges = ?, urlModele = ? WHERE idAvion = ?';
        $req = $this->executerRequete($sql, [$avion['nom'], $avion['autresDetails'], $avion['nbreSieges'], $avion['urlModele'], $avion['idAvion']]);

        return $req;
    }
}
