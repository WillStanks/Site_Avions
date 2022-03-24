<?php $titre = "Modification d'un avion"; ?>
<?php ob_start(); ?>

    <form action="index.php?action=modifierAvion" method="post">
        <h2>Modifier un avion V0.3.1</h2>
        <p>
            <label for="nom">Nom de l'avion</label> : <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($donnees['nom']); ?>" /><br />
            <label for="texte">Détails de l'avion</label> : <textarea rows="4" cols="50" type="text" name="autresDetails" id="autresDetails"><?php echo htmlspecialchars($donnees['autresDetails']); ?></textarea><br />
            <label for="nom">Nombre de sièges</label> : <input type="number" name="nbreSieges" id="nbreSieges" value="<?php echo htmlspecialchars($donnees['nbreSieges']); ?>" /><br />
            <input type="hidden" name="idAvion" value="<?php echo $donnees['idAvion']; ?>" />
            <input type="submit" value="Modifier" />
        </p>
    </form>
    <form action="index.php">
        <input type="submit" value="Annuler" />
    </form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>