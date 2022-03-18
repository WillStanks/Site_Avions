
<?php

require 'Controleur.php';

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
        } else {
            throw new Exception("Action non valide");
        }
    } else
        accueil(); // Action par défaut.
} catch (Exception $e) {
    erreur($e->getMessage());
}
