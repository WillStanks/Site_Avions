<?php $titre = "Ajouter un avion"; ?>
<?php ob_start(); ?>

    <form action="index.php?action=insertAvion" method="post">
        <h2>Ajouter un avion V0.3.1</h2>
        <p>
            <label for="nom">Nom de l'avion</label> : <input type="text" name="nom" id="nom" /><br />
            <label for="titre">Détails de l'avion</label> : <textarea rows="4" cols="50" type="text" name="autresDetails" id="autresDetails"></textarea><br />
            <label for="nom">Nombre de sièges</label> : <input type="number" name="nbreSieges" id="nbreSieges" value="<?php echo htmlspecialchars($donnees['nbreSieges']); ?>" /><br />
            <input type="submit" value="Ajouter" />
        </p>
    </form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>

