<?php $titre = 'Liste des avions'; ?>

<?php ob_start(); ?>

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
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>