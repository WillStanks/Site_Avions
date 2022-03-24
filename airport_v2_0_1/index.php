
<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'avion') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    avion($id);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        }
        if ($_GET['action'] == 'nouveauAvion'){
            nouveauAvion();
        }
        if ($_GET['action'] == 'insertAvion'){
            $avion = $_POST;
            insertAvion($avion);
        }
        if ($_GET['action'] == 'supprimerAvion'){
            if (isset($_POST['idAvion'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['idAvion']);
                if ($id != 0) {
                    supprimerAvion($id);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        }
        if ($_GET['action'] == 'confirmerSupp'){
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmerSupp($id);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        }
        if ($_GET['action'] == 'modifierAvion'){
            if (isset($_POST['idAvion'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['idAvion']);
                if ($id != 0) {
                    $avion = $_POST;
                    modifierAvion($avion);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        }
        if ($_GET['action'] == 'confirmerModif'){
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmerModif($id);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        }
        if ($_GET['action'] == 'nouvelleReserv'){
            nouvelleReserv();
        }
        if ($_GET['action'] == 'insertReserv'){
            $avion = $_POST;
            insertReserv($avion);
        }
        else {
            throw new Exception("Action non valide");
        }
    } else
        accueil(); // Action par défaut.
} catch (Exception $e) {
    erreur($e->getMessage());
}
