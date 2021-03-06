<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airport_v0_0_1;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Suppression de l'avion à l'aide d'une requête préparée
$req = $bdd->prepare('DELETE FROM avion WHERE idAvion = ?');
$req->execute(array($_POST['idAvion']));

// Redirection du visiteur vers la page d'accueil du Blogue
// Mettre en commentaire pour déboguer
header('Location: index.php');
?>
<!-- Pour déboguage -->
<html>

<body>
    <h2>Supprimer un commentaire V0.3.1</h2>
    <form action="index.php">
        *** Pour déboguage ***<br />
        Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
        <?php var_dump($_POST); ?>
        <input type="submit" value="Continuer">
    </form>
</body>

</html>