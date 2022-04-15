<?php

require_once 'Modele/avion.php';
require_once 'Vue/Vue.php';

class ControleurAvion
{
    private $avion;

    public function __construct()
    {
        $this->avion = new Avion();
    }

    public function avions()
    {
        $avions = $this->avion->getAvions();
        $vue = new Vue("Avions");
        $vue->generer(array('avions' => $avions));
    }
}
