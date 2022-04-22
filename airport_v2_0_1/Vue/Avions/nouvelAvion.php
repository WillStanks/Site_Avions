<?php $titre = "Ajouter un avion"; ?>


<form action="Avions/ajouter" method="post">
    <h2>Ajouter un avion V0.3.1</h2>
    <p>
        <label for="nomAvion">Nom de l'avion</label> : <input type="text" name="nomAvion" id="auto" /><br />
        <label for="titre">Détails de l'avion</label> : <textarea rows="4" cols="50" type="text" name="autresDetails" id="autresDetails"></textarea><br />
        <label for="nom">Nombre de sièges</label> : <input type="number" name="nbreSieges" id="nbreSieges" value="<?php echo htmlspecialchars($donnees['nbreSieges']); ?>" /><br />
        <label for="urlModele">Site du modele d'avion (URL)</label> : <input type="text" name="urlModele" id="urlModele" /><br />
        <input type="submit" value="Ajouter" />
    </p>
</form>