<?php $titre = 'Liste des avions'; ?>
<h1 data-i18n="ListeAvions">Liste des avions disponibles</h1>

<a href="AdminAvions/nouvelAvion">Ajouter un avion</a>

<?php
foreach ($avions as $avion) :
?>
    <?php if ($avion['efface'] == '0') : ?>
        <p><a href="AdminAvions/supprimerAvion/<?= $this->nettoyer($avion['idAvion']) ?>"> [Supprimer]</a><br />
            <a href="AdminAvions/modifierAvion/<?= $this->nettoyer($avion['idAvion']) ?>"> [Modifier]</a><br />
            <a href="AdminAvions/avion/<?= $this->nettoyer($avion['idAvion']) ?>"><?= $this->nettoyer($avion['nom']) ?></a><br />
            <?= $this->nettoyer($avion['autresDetails']) ?><br />
            <?= $avion['nbreSieges'] . " sièges" ?><br />
            <?= "Site de l'avion : " . $this->nettoyer($avion['urlModele']) ?> <br />
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminAvions/retablir/<?= $this->nettoyer($avion['idAvion']) ?>"> [Rétablir]</a><br />
            L'avion <?= $this->nettoyer($avion['nom']) ?> à été effacé !<br />
        </p>
    <?php endif; ?>
<?php endforeach; ?>