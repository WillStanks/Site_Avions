<?php

require_once 'Modele/Avion.php';

$tstAvion = new Avion;
$avions = $tstAvion->getAvions();
echo '<h3>Test getAvions : </h3>';
var_dump($avions->rowCount());

echo '<h3>Test getAvion : </h3>';
$avion = $tstAvion->getAvion(1);
var_dump($avion);
