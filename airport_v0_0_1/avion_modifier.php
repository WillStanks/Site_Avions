<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Modifier un avion</title>
</head>
<style>
    form {
        text-align: center;
    }
</style>

<body>


    <?php
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airport_v0_0_1;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Récupération de l'avion à modifier
    //$reponse = $bdd->query('SELECT * FROM Avion WHERE id = ' . $_GET['id']);
    try {
        $req = $bdd->prepare('SELECT * FROM avion WHERE idAvion = ?');
        $req->execute(array($_GET['id']));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Affichage de l'avion à modifer (toutes les données externes sont protégées par htmlspecialchars)
    $donnees = $req->fetch();
    $req->closeCursor();
    ?>

    <form action="avion_mise_a_jour.php" method="post">
        <h2>Modifier un avion V0.3.1</h2>
        <p>
            <label for="nom">Nom de l'avion</label> : <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($donnees['nom']); ?>" /><br />
            <label for="texte">Détails de l'avion</label> : <textarea rows="4" cols="50" type="text" name="autresDetails" id="autresDetails"><?php echo htmlspecialchars($donnees['autresDetails']); ?></textarea><br />
            <label for="nom">Nombre de sièges</label> : <input type="number" name="nbreSieges" id="nbreSieges" value="<?php echo htmlspecialchars($donnees['nbreSieges']); ?>" /><br />
            <input type="hidden" name="idAvion" value="<?php echo $_GET['id']; ?>" />
            <input type="submit" value="Modifier" />
        </p>
    </form>
    <form action="index.php">
        <input type="submit" value="Annuler" />
    </form>


</body>

</html>