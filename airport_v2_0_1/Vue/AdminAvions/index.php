<?php $titre = 'Liste des avions'; ?>

<h1 data-i18n="ListeAvions">Liste des avions disponibles</h1>

<a href="AdminAvions/nouvelAvion">Ajouter un avion</a>
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
foreach ($avions as $avion) {
    echo '<tr><td>' .
        '<p><a href="Avions/modifierAvion/' . $avion['idAvion'] . '">[mod.]</a> ' .
        '<a href="Avions/supprimerAvion/' . $avion['idAvion'] . '">[suppr.]</a> </td><td><strong>' .
        '<a href="Avions/avion/' . $avion['idAvion'] . '">' . htmlspecialchars($this->nettoyer($avion['nom'])) . '</strong></a></td><td>';
    echo htmlspecialchars($this->nettoyer($avion['autresDetails'])) . '</td><td>' . htmlspecialchars($avion['nbreSieges']) . ' sièges</td><td> Site de l\'avion'
        . htmlspecialchars($this->nettoyer($avion['urlModele'])) . '</td></tr>';
}
