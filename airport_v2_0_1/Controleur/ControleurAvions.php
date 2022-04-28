<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Avion.php';
require_once 'Modele/Reservation.php';

class ControleurAvions extends Controleur
{
    private $avion;
    private $reservation;

    public function __construct()
    {
        $this->avion = new Avion();
        $this->reservation = new Reservation();
    }
    // Affiche la liste de tous les avions
    public function index()
    {
        $avions = $this->avion->getAvions();
        $this->genererVue(['avions' => $avions]);
    }
    // Affiche les détails sur un avion
    public function avion()
    {
        $id = $this->requete->getParametreId("id");
        $avion = $this->avion->getAvion($id);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $reservations = $this->reservation->getReservations($id);
        $this->genererVue(['avion' => $avion, 'reservations' => $reservations, 'erreur' => $erreur]);
    }

    public function nouvelAvion()
    {
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $this->genererVue(['erreur' => $erreur]);
    }

    // Enregistre le nouvel avion et retourne à la liste des avions
    public function ajouter()
    {
        $avion['nom'] = $this->requete->getParametre('nomAvion');
        $avion['urlModele'] = $this->requete->getParametre('urlModele');
        $validation_url = filter_var($avion['urlModele'], FILTER_VALIDATE_URL);
        if($validation_url){
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            $avion['autresDetails'] = $this->requete->getParametre('autresDetails');
            $avion['nbreSieges'] = $this->requete->getParametre('nbreSieges');
            $this->avion->setAvion($avion);
            $this->executerAction('index');
        } else {
            //Recharger la page avec une erreur près de l'url
            $this->requete->getSession()->setAttribut('erreur', 'urlModele');
            $this->executerAction('nouvelAvion');
        }
       
    }

    // Modifier un avion existant    
    public function modifierAvion()
    {
        $id = $this->requete->getParametreId('id');
        $avion = $this->avion->getAvion($id);
        $this->genererVue(['avion' => $avion]);
    }

    // Enregistre l'avion modifié et retourne à la liste des avions
    public function miseAJourAvion()
    {
        $avion['idAvion'] = $this->requete->getParametreId('idAvion');
        $avion['nom'] = $this->requete->getParametre('nom');
        $avion['autresDetails'] = $this->requete->getParametre('autresDetails');
        $avion['nbreSieges'] = $this->requete->getParametre('nbreSieges');
        $avion['urlModele'] = $this->requete->getParametre('urlModele');
        $this->avion->modifAvion($avion);
        $this->executerAction('index');
    }

    public function supprimerAvion()
    {
        $id = $this->requete->getParametreId('id');
        $avion = $this->avion->getAvion($id);
        $this->genererVue(['avion' => $avion]);
    }

    public function supprimer()
    {
        $id = $this->requete->getParametreId('idAvion');
        $avion = $this->avion->getAvion($id);
        $this->avion->deleteAvion($id);
        $this->executerAction('index');
        $this->rediriger('Avions');
    }
}
