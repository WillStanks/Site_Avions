<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Ajout d'un avion</title>
</head>
<style>
    form {
        text-align: center;
    }
</style>

<body>

    <form action="avion_envoyer.php" method="post">
        <h2>Ajouter un avion V0.1.1</h2>
        <p>
            <label for="nom">Nom de l'avion</label> : <input type="text" name="nom" id="nom" /><br />
            <label for="titre">Détails de l'avion</label> : <textarea rows="4" cols="50" type="text" name="autresDetails" id="autresDetails"></textarea><br />
            <label for="nom">Nombre de sièges</label> : <input type="number" name="nbreSieges" id="nbreSieges" value="<?php echo htmlspecialchars($donnees['nbreSieges']); ?>" /><br />
            <input type="hidden" name="idAvion" value="1" /><br />
            <input type="submit" value="Ajouter" />
        </p>
    </form>

</body>

</html>