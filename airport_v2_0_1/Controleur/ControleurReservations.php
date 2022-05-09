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


    public function index()
    {
        $nbReserv = $this->reservation->getNombreReserv();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbReserv' => $nbReserv, 'login' => $login));
    }
}
