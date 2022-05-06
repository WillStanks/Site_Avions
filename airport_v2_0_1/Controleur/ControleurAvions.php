<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Avion.php';
require_once 'Modele/Reservation.php';

class ControleurAvions extends Controleur
{
    private $avion;
    private $reservation;

    public function __construct()
    {
        $this->avion = new Avion();
        $this->reservation = new Reservation();
    }
    // Affiche la liste de tous les avions
    public function index()
    {
        $avions = $this->avion->getAvions();
        $this->genererVue(['avions' => $avions]);
    }
    // Affiche les détails sur un avion
    public function avion()
    {
        $id = $this->requete->getParametreId("id");
        $avion = $this->avion->getAvion($id);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $reservations = $this->reservation->getReservations($id);
        $this->genererVue(['avion' => $avion, 'reservations' => $reservations, 'erreur' => $erreur]);
    }
}
