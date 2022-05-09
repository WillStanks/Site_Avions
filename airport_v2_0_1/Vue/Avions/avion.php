<?php $titre = "Mon avion - " . $this->nettoyer($avion['nom']); ?>


<header>
  <a href="Avions/"> Revenir à la page d'accueil</a>
  <h1 class="nomAvion"><?= $this->nettoyer($avion['nom']) ?></h1>
  <h3>Détails de l'avion</h3>
  <p><?= $this->nettoyer($avion['autresDetails']) ?></p>
  <p><?= $avion['nbreSieges'] ?> sièges</p>
  <p><?= $this->nettoyer($avion['urlModele']) ?></p>
  <h1 class="nomAvion">Réservations associés a l'avion <?= $avion['nom'] ?></h1>
</header>

Cet avion comporte <?= $this->nettoyer($nbReserv) ?> réservations.