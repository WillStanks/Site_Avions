<?php

abstract class modele
{
    // Objet PDO d'accès à la BD
    private $bdd;

    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);
        } else {
            $resultat = $this->getBdd()->prepare($sql);
            $resultat->execute($params);
        }
        return $resultat;
    }

    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    private function getBdd()
    {
        // Connexion à la base de données
        try {
            if ($this->bdd == null) {
                $this->bdd = new PDO('mysql:host=localhost;dbname=airport_v2_1_3;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            require 'Vue/vueErreur.php';
        }

        return $this->bdd;
    }
}
