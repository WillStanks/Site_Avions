<?php $titre = "Modification d'un avion"; ?>


<form action="Avions/miseAJourAvion" method="post">
    <h2>Modifier un avion V0.3.1</h2>
    <p>
        <label for="nom">Nom de l'avion</label> : <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($this->nettoyer($avion['nom'])); ?>" /><br />
        <label for="texte">Détails de l'avion</label> : <textarea rows="4" cols="50" type="text" name="autresDetails" id="autresDetails"><?php echo htmlspecialchars($this->nettoyer($avion['autresDetails'])); ?></textarea><br />
        <label for="nom">Nombre de sièges</label> : <input type="number" name="nbreSieges" id="nbreSieges" value="<?php echo htmlspecialchars($avion['nbreSieges']); ?>" /><br />
        <label for="urlModele">Site du modele d'avion (URL)</label> : <input type="text" name="urlModele" id="urlModele" value="<?php echo htmlspecialchars($this->nettoyer($avion['urlModele'])); ?>" /><br />
        <input type="hidden" name="idAvion" value="<?php echo $avion['idAvion']; ?>" />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="Avions/" method="post">
    <input type="submit" value="Annuler" />
</form>