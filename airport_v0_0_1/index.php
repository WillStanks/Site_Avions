<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Liste des avions</title>
</head>
<style>
    form {
        text-align: center;
    }
</style>

<body>
    <h2>Avions Air Transat V0.1.1</h2>

    <a href="avion_nouveau.php">Ajouter un avion</a>

    <?php
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airport_v0_0_1;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Récupération des 10 derniers avions
    $reponse = $bdd->query('SELECT * FROM avion');

    // Affichage de chaque avion (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch()) {
        echo '<p><a href="avion_modifier.php?id=' . $donnees['idAvion'] . '">[modifier]</a> <strong>' .
            htmlspecialchars($donnees['nom']) . '</strong> </br>';
        echo htmlspecialchars('Détails de l\'avion : ' . $donnees['autresDetails']) . '</br>' . htmlspecialchars('Nombre de sièges : ' . $donnees['nbreSieges']);
    }

    $reponse->closeCursor();

    ?>
</body>

</html>