<?php

require_once 'Modele/Reservation.php';
require_once 'Framework/Vue.php';

class ControleurReservations extends Controleur
{

    private $reservation;

    public function __construct()
    {
        $this->reservation = new Reservation();
    }

    // L'action index n'est pas utilisée mais pourrait ressembler à ceci 
    // en ajoutant la fonctionnalité de faire afficher tous les reservations.
    public function index()
    {
        $reservations = $this->reservation->getReservations();
        $this->genererVue(['reservations' => $reservations]);
    }

    // Ajoute une réservation à un avion
    public function reservation()
    {
        $reservation['idDonnee'] = $this->requete->getParametreId("idDonnee");
        $reservation['idAvion'] = $this->requete->getParametre('idAvion');
        $validation_courriel = filter_var($reservation['courriel'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            $reservation['idAeroport'] = $this->requete->getParametre('idAeroport');
            $reservation['idUtilisateur'] = $this->requete->getParametre('idUtilisateur');
            // Ajouter la reservation à l'aide du modèle
            $this->reservation->setReservation($reservation);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
        }
        //Recharger la page pour mettre à jour la liste des reservations associés ou afficher une erreur
        $this->rediriger('Avions', 'avion/' . $reservation['idAvion']);
    }
}
