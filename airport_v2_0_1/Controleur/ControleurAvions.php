<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/avion.php';

class ControleurAvions extends Controleur
{
    private $avion;

    public function __construct()
    {
        $this->avion = new Avion();
    }

    public function index()
    {
        $avions = $this->avion->getAvions();
        $this->genererVue(array('avions' => $avions));
    }
}
