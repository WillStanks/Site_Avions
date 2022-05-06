<?php $titre = "Supprimer un avion"; ?>


<form action="AdminAvions/supprimer" method="post">
    <h2>Supprimer un avion V0.3.1</h2>
    <p>
        Nom : <?php echo htmlspecialchars($this->nettoyer($avion['nom'])); ?><br />
        Détails de l'avion : <?php echo htmlspecialchars($this->nettoyer($avion['autresDetails'])); ?><br />
        Nombres de sièges : <?php echo htmlspecialchars($avion['nbreSieges']); ?><br />
        URL du modele de l'avion : <?php echo htmlspecialchars($this->nettoyer($avion['urlModele'])); ?><br />
        <input type="hidden" name="idAvion" value="<?php echo $avion['idAvion']; ?>" />
        <input type="submit" value="Supprimer" />
    </p>
</form>
<form action="AdminAvions" method="post">
    <input type="submit" value="Annuler" />
</form>