<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <title><?= $titre ?></title>
</head>
<style>
    form {
        text-align: center;
    }
</style>

<body>
    <div id="global">
        <h2>Avions Air Transat V3.0.3</h2>

        <a href="Vue/a_propos.html">À propos</a></br>

        <div id="contenu">
            <?= $contenu ?>
        </div>

        <footer id="pied">
            Site réalisé avec PHP, HTML5 et CSS.
        </footer>
    </div>
</body>

</html>