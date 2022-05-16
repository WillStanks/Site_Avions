<?php $titre = 'Liste des avions'; ?>

<h2>William Stancu</h2>
<p><strong> 420-4a4 MO </strong> Web et bases de données </br>Hiver 2022, Collège Montmorency</p>
<a href="Avions">Retour à la page d'accueil</a>
<h3>Diagramme réalisé avec Designer</h3>
<img src="Contenu\images\apropos\diagrammeWill.PNG" alt="Diagramme PhpMyAdmin" width="30%">
<h3>Diagramme source</h3>
<a href="http://www.databaseanswers.org/data_models/flight_bookings/index.htm"> Lien vers la source </a></br>
<img src="Contenu\images\apropos\diagrammeVol.png" alt="Diagramme Source" width="20%">
<h3>Brève explication du fonctionnement de mon application</h3>
<h4>Type d'association entre les 2 tables.</h4>
<p>
    Les tables avion ainsi que donnees_reservations sont associés via la clé primaire idAvion de la table
    avion et la clé étrangère idAvion de la table donnees_reservations.
</p>
<h4>Comment effectuer l'ajout sur les 2 tables.</h4>
<p>
    Pour la table avion il vous suffit de cliquer sur le bouton "Ajouter un avion" qui vous dirigera vers la
    page pour ajouter un avion.</br>Pour la table donnees_reservations il vous suffit de cliquer sur l'avion que vous souhaiter ajouter
    une réservation et ensuite cliquer sur le bouton "Ajouter une réservation" qui vous dirigera vers la page pour ajouter une réservation.
</p>
<h4>Comment effectuer la modification et suppression.</h4>
<p>
    Pour la modification et la suppression il vous suffit de cliquer sur les boutons [mod.] ou [suppr.] pour
    pouvoir avoir accès a la modification ou la suppression de l'avion que vous désirez.
</p>
<h4>Comment effectuer la validation courriel et d'un autre champ</h4>
<p>
    Pour la validation du courriel elle se fait lorsque vous voulez ajouter une réservation.
    En effet, lorsque vous voulez ajouter une réservation il vous faudra ajouter un courriel valide
    selon le format de courriel standard sinon une erreur vous empechera de confirmer l'ajout.</br>
    C'est pareil pour l'autre champ qui la validation d'un URL qui se fera dans l'ajout et la modification
    d'un avion. C'est l'URL du modele d'avion.
</p>
<h4>Champ utilisé pour l'autocomplétion</h4>
<p>
    Lors de l'ajout d'un avion c'est le champ du nom du modele de l'avion qui est utilisé pour pouvoir
    trouver le nom du modele d'avion plus facilement. Il vous suffit d'inscrire les lettres ou chiffres du
    modele désiré et les offres de modele s'afficheront en liste.
</p>
<h4>Langue utilisé pour l'application</h4>
<p>
    Les 3 langues utilisé pour l'application sont le francais, l'anglais et le roumain.
    L'expréssion traduite se trouve la vueAccueil.
</p>