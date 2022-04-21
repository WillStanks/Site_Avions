<?php

require_once 'Configuration.php';

abstract class modele
{
    // Objet PDO d'accès à la BD
    private static $bdd;

    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = self::getBdd()->query($sql);
        } else {
            $resultat = self::getBdd()->prepare($sql);
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
            if (self::$bdd == null) {
                // Récupération des paramètres de configuration BD
                $dsn = Configuration::get("dsn");
                $login = Configuration::get("login");
                $mdp = Configuration::get("mdp");
                // Création de la connexion
                self::$bdd = new PDO(
                    $dsn,
                    $login,
                    $mdp,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                );
            }
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            require 'Vue/vueErreur.php';
        }

        return self::$bdd;
    }
}
