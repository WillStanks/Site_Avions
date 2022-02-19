<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Supprimer un avion</title>
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

    // Récupération de l'avion à supprimer
    try {
        $req = $bdd->prepare('SELECT * FROM avion WHERE idAvion = ?');
        $req->execute(array($_GET['id']));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Affichage de l'avion à supprimer (toutes les données externes sont protégées par htmlspecialchars)
    $donnees = $req->fetch();
    $req->closeCursor();
    ?>

    <form action="avion_supprimer.php" method="post">
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

</body>

</html>