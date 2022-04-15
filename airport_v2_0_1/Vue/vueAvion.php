<?php $titre = "Mon avion - " . $avion['nom']; ?>


<header>
  <h1 class="nomAvion"><?= $avion['nom'] ?></h1>
  <h3>Détails de l'avion</h3>
  <p><?= $avion['autresDetails'] ?></p>
  <p><?= $avion['nbreSieges'] ?> sièges</p>
  <p><?= $avion['urlModele'] ?></p>
  <h1 class="nomAvion">Réservations associés a l'avion <?= $avion['nom'] ?></h1>
</header>
<?php foreach ($reservations as $reserv) : ?>
  <p>Id de la donnée de réservation : <?= $reserv['idDonnee'] ?></p>
  <p>Id de l'aeroport : <?= $reserv['idAeroport'] ?></p>
  <p>Id de l'utilisateur : <?= $reserv['idUtilisateur'] ?></p>
  <p>Courriel de la réservation : <?= $reserv['courriel'] ?></p>
<?php endforeach; ?>
<a href="index.php?action=nouvelleReserv&idAvion=<?= $avion['idAvion'] ?>"> Ajouter une réservation</a>