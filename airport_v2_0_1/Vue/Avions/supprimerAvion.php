<?php $titre = "Supprimer un avion"; ?>


<form action="Avions/supprimer" method="post">
    <h2>Supprimer un avion V0.3.1</h2>
    <p>
        Nom : <?php echo htmlspecialchars($avion['nom']); ?><br />
        Détails de l'avion : <?php echo htmlspecialchars($avion['autresDetails']); ?><br />
        Nombres de sièges : <?php echo htmlspecialchars($avion['nbreSieges']); ?><br />
        <input type="hidden" name="idAvion" value="<?php echo $avion['idAvion']; ?>" />
        <input type="submit" value="Supprimer" />
    </p>
</form>
<form action="index.php">
    <input type="submit" value="Annuler" />
</form>