<?php $titre = "Ajouter une réservation"; ?>
<?php ob_start(); ?>

    <form action="index.php?action=insertReserv" method="post">
        <h2>Ajouter une réservation V0.3.1</h2>
        <p>
            <label for="idAvion">ID de l'avion</label> : <input type="number" name="idAvion" id="idAvion" /><br />
            <label for="idAeroport">ID de l'aeroport</label> : <input type="number" name="idAeroport" id="idAeroport" /><br />
            <label for="idUtilisateur">ID de l'utilisateur</label> : <input type="number" name="idUtilisateur" id="idUtilisateur" /><br />
            <input type="submit" value="Ajouter" />
        </p>
    </form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>
