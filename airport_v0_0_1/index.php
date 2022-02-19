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
    <h2>Avions Air Transat V0.3.1</h2>

    <a href="a_propos.html">À propos</a></br>
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
    ?>

    <table>
        <tr>
            <th>Actions</th>
            <th>Nom de l'avion</th>
            <th>Détails de l'avion</th>
            <th>Nombre de sièges</th>
        </tr>
    </table>

    <?php
    // Affichage de chaque avion (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch()) {
        echo '<tr><td>' .
            '<p><a href="avion_modifier.php?id=' . $donnees['idAvion'] . '">[mod.]</a> ' .
            '<a href="avion_confirmer.php?id=' . $donnees['idAvion'] . '">[suppr.]</a> <strong></td><td>' .
            htmlspecialchars($donnees['nom']) . '</strong></td><td>';
        echo htmlspecialchars($donnees['autresDetails']) . '</td><td>' . htmlspecialchars($donnees['nbreSieges']) . ' sièges</td></tr>';
    }

    $reponse->closeCursor();

    ?>
</body>

</html>