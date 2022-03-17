<?php $titre = "Mon avion - " . $avion['nom']; ?>

<?php ob_start(); ?>

<header>
    <h1><?= $avion['nom'] ?></h1>
    <p><?= $avion['autresDetails'] ?></p>
    <p><?= $avion['nbreSieges'] ?></p>
  <h1>Réservations associés a l'avion <?= $avion['nom'] ?></h1>
</header>
<?php foreach ($reservations as $reserv): ?>
  <p>Id de la donnée de réservation : <?= $reserv['idDonnee'] ?></p>
  <p>Id de l'aeroport : <?= $reserv['idAeroport'] ?></p>
  <p>Id de l'utilisateur : <?= $reserv['idUtilisateur'] ?></p>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>