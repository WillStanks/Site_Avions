<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
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
        <header>
            <a href="#" class="lang-switch" data-locale="fr">Francais</a>
            <a href="#" class="lang-switch" data-locale="en">English</a>
            <a href="#" class="lang-switch" data-locale="ro">Romanian</a>
        </header>
        <h2>Avions Air Transat V3.0.3</h2>

        <a href="<?= $utilisateur != null ? 'Admin' : ''; ?>Commentaires"></a>

        <a href="Apropos">À propos</a></br>
        <a href="tests.php">
            <h3>TESTS</h3>
        </a>

        <?php if (isset($utilisateur)) : ?>
            <h3>Bonjour <?= $utilisateur['nom'] ?>,
                <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
            </h3>
        <?php else : ?>
            <h3>[<a href="Utilisateurs/index">Se connecter</a>] <small>(admin/admin)</small></h3>
        <?php endif; ?>

        <div id="contenu">
            <?= $contenu ?>
        </div>

        <span id="pied" data-i18n="footerGabarit">Site réalisé avec PHP, HTML5 et CSS.</span>
    </div>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="Contenu/js/autocompleteType.js"></script>
    <script src="Contenu/jquery.i18n/src/CLDRPluralRuleParser.js"></script>
    <script src="Contenu/jquery.i18n/src/jquery.i18n.js"></script>
    <script src="Contenu/jquery.i18n/src/jquery.i18n.messagestore.js"></script>
    <script src="Contenu/jquery.i18n/src/jquery.i18n.fallbacks.js"></script>
    <script src="Contenu/jquery.i18n/src/jquery.i18n.language.js"></script>
    <script src="Contenu/jquery.i18n/src/jquery.i18n.parser.js"></script>
    <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.js"></script>
    <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.bidi.js"></script>
    <script src="Contenu/i18n/main-jquery_i18n.js"></script>
</body>

</html>