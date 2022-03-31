
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
        } else if ($_GET['action'] == 'nouveauAvion') {
            $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
            nouveauAvion($erreur);
        } else if ($_GET['action'] == 'insertAvion') {
            $avion = $_POST;
            insertAvion($avion);
        } else if ($_GET['action'] == 'supprimerAvion') {
            if (isset($_POST['idAvion'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['idAvion']);
                if ($id != 0) {
                    supprimerAvion($id);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        } else if ($_GET['action'] == 'confirmerSupp') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmerSupp($id);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        } else if ($_GET['action'] == 'modifierAvion') {
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
        } else if ($_GET['action'] == 'confirmerModif') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmerModif($id);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        } else if ($_GET['action'] == 'nouvelleReserv') {
            if (isset($_GET['idAvion'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $idAvion = intval($_GET['idAvion']);
                if ($idAvion != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    nouvelleReserv($idAvion, $erreur);
                } else
                    throw new Exception("Identifiant de l'avion incorrect");
            } else
                throw new Exception("Aucun identifiant de l'avion");
        } else if ($_GET['action'] == 'insertReserv') {
            if (isset($_POST['idAvion'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['idAvion']);
                if ($id != 0) {
                    // Récupérer les données du formulaire
                    $reservation = $_POST;
                    //Réaliser l'action insertReserv du contrôleur
                    insertReserv($reservation);
                } else
                    throw new Exception("Identifiant d'avion incorrect");
            } else
                throw new Exception("Aucun identifiant d'avion");
        } else if($_GET['action'] == 'quelsTypes') {
            quelsTypes($_GET['term']);
        } else {
            throw new Exception("Action non valide");
        }
    } else
        accueil(); // Action par défaut.
} catch (Exception $e) {
    erreur($e->getMessage());
}
