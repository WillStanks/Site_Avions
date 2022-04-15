<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleAvion') {
        require 'Tests/Modeles/testAvion.php';
    } else if ($_GET['test'] == 'vueAvions') {
        require 'Tests/Vues/testVueAvion.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleAvion">Avion</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueAvions">Avions</a>
    </li>
</ul>