<?php $titre = "Ajouter une réservation"; ?>


<form action="AdminReservations/ajouter/" method="post">
    <h2>Ajouter une réservation V0.3.1</h2>
    <p>
        <label for="idAeroport">ID de l'aeroport</label> : <input type="number" name="idAeroport" id="idAeroport" /><br />
        <label for="idUtilisateur">ID de l'utilisateur</label> : <input type="number" name="idUtilisateur" id="idUtilisateur" /><br />
        <label for="courriel">Courriel de la réservation (a@b.c)</label> : <input type="text" name="courriel" id="courriel" />
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?>
        <br />
        <input type="hidden" name="idAvion" value="<?= $idAvion ?>" /><br />
        <input type="submit" value="Ajouter" />
    </p>
</form>