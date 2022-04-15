<?php

require_once 'Vue/Vue.php';

$avions = [
    [
        'idAvion' => '20',
        'nom' => 'Airbus A330-200 S',
        'autresDetails' => 'AutresDetails de lavion A330-200 S',
        'nbreSieges' => 225,
        'urlModele' => 'http://www.mostov'
    ],
    [
        'idAvion' => '21',
        'nom' => 'Airbus A330-30',
        'autresDetails' => 'Moteurs : 2 Rolls Royce Trent 772',
        'nbreSieges' => 375,
        'urlModele' => 'http://www.mostov'
    ]
];

$vue = new Vue('Avions');
$vue->generer(['avions' => $avions]);
