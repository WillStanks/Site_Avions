<?php $titre = "Mon avion - " . $this->nettoyer($avion['nom']); ?>


<header>
  <a href="AdminAvions"> Revenir à la page d'accueil</a>
  <h1 class="nomAvion"><?= $this->nettoyer($avion['nom']) ?></h1>
  <h3>Détails de l'avion</h3>
  <p><?= $this->nettoyer($avion['autresDetails']) ?></p>
  <p><?= $avion['nbreSieges'] ?> sièges</p>
  <p><?= $this->nettoyer($avion['urlModele']) ?></p>
  <?php
  if ($avion['image'] != "") {
    echo '<img src="' . 'Contenu/images/avions/' . $avion['image'] . '" width=50px>';
  }
  ?>
  <h1 class="nomAvion">Réservations associés a l'avion <?= $avion['nom'] ?></h1>
</header>
<?php foreach ($reservations as $reserv) : ?>
  <a href="AdminReservations/modifierReserv/<?= $reserv['idDonnee'] ?>">[mod.]</a>
  <p>Id de la donnée de réservation : <?= $this->nettoyer($reserv['idDonnee']) ?></p>
  <p>Id de l'aeroport : <?= $this->nettoyer($reserv['idAeroport']) ?></p>
  <p>Id de l'utilisateur : <?= $this->nettoyer($reserv['idUtilisateur']) ?></p>
  <p>Courriel de la réservation : <?= $this->nettoyer($reserv['courriel']) ?></p>
<?php endforeach; ?>
<a href="AdminReservations/nouvelReserv/<?= $avion['idAvion'] ?>"> Ajouter une réservation</a>