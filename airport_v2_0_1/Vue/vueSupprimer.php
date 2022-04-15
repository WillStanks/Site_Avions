<?php $titre = "Supprimer un avion"; ?>


<form action="index.php?action=supprimerAvion" method="post">
    <h2>Supprimer un avion V0.3.1</h2>
    <p>
        Nom : <?php echo htmlspecialchars($donnees['nom']); ?><br />
        Détails de l'avion : <?php echo htmlspecialchars($donnees['autresDetails']); ?><br />
        Nombres de sièges : <?php echo htmlspecialchars($donnees['nbreSieges']); ?><br />
        <input type="hidden" name="idAvion" value="<?php echo $donnees['idAvion']; ?>" />
        <input type="submit" value="Supprimer" />
    </p>
</form>
<form action="index.php">
    <input type="submit" value="Annuler" />
</form>