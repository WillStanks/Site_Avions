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
        $fichierImage = $this->enregistrerImage($avion['image']);
        // Insertion de l'avion à l'aide d'une requête préparée
        $sql = 'INSERT INTO avion (nom, autresDetails, nbreSieges, urlModele, image) VALUES(?, ?, ?, ?, ?)';
        $req = $this->executerRequete($sql, [$avion['nom'], $avion['autresDetails'], $avion['nbreSieges'], $avion['urlModele'], $fichierImage]);

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

    // Enregistre une image associé à un avion
    private function enregistrerImage($image)
    {
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($image) and $image['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            $dimension = $image['size'];
            if ($dimension <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($image['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    $fichierImage = 'Contenu/images/avions/' . basename($image['name']);
                    move_uploaded_file($image['tmp_name'], $fichierImage);
                    return basename($image['name']);
                } else {
                    throw new Exception("L'extension '$extension_upload' n'est pas autorisée pour les images");
                }
            } else {
                throw new Exception("Votre image ($dimension octets) dépasse la dimension autorisée (1000000 octets)");
            }
        } else {
            throw new Exception("Erreur rencontrée lors de la transmission du fichier");
        }
    }
}
