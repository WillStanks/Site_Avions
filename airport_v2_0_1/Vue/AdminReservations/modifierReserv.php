<?php $titre = "Modification une réservation"; ?>


<form action="AdminReservations/miseAJourReserv" method="post">
    <h2>Modifier une réservation V0.3.1</h2>
    <p>
        <label for="idAeroport">Id de l'aéroport</label> : <input type="number" name="idAeroport" id="idAeroport" value="<?php echo htmlspecialchars($this->nettoyer($reservation['idAeroport'])); ?>" /><br />
        <label for="idUtilisateur">Id de l'aéroport</label> : <input type="number" name="idUtilisateur" id="idUtilisateur" value="<?php echo htmlspecialchars($this->nettoyer($reservation['idUtilisateur'])); ?>" /><br />
        <label for="courriel">Courriel de la réservation (a@b.c)</label> : <input type="text" name="courriel" id="courriel" value="<?php echo htmlspecialchars($this->nettoyer($reservation['courriel'])); ?>" />
        <input type="hidden" name="idDonnee" value="<?php echo $reservation['idDonnee']; ?>" />
        <input type="hidden" name="idAvion" value="<?= $reservation['idAvion'] ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="AdminAvions/avion/" method="post">
    <input type="hidden" name="id" value="<?= $reservation['idAvion'] ?>" /><br />
    <input type="submit" value="Annuler" />
</form>