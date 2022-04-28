<?php

require_once 'Modele/avion_type.php';

class ControleurAvion_types extends Controleur {

    private $avion_type;

    public function __construct() {
        $this->avion_type = new Avion_type();
    }

// recherche et retourne les types pour l'autocomplete
    public function index() {
        $term = $this->requete->getParametre('term');
        echo $this->avion_type->searchType($term);
    }

}