<?php
/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); 
//on filtre action pour savoir dans controleur connexion on est a quel switch case 
// alors que uc cT pour savoir dans quel controleur aller
if (!$action) { // la c sur que la variable est vide
    $action = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    //var_dump($login);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $visiteur = $pdo->getInfosVisiteur($login, $mdp); //on sait que la fonction est dans pdo grace a $pdo->fonction()
    $comptable = $pdo->getInfosComptable($login, $mdp);
    if (!is_array($visiteur)&& !is_array($comptable)) {
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    } if(is_array($comptable) && !is_array($visiteur)) {
        $id = $comptable['id'];
        $nom = $comptable['nom'];
        $prenom = $comptable['prenom'];
        connecterC($id, $nom, $prenom, $statut);
        header('Location: index.php');
        //var_dump($login);
    } else {
        $id = $visiteur['id'];
        $nom = $visiteur['nom'];
        $prenom = $visiteur['prenom'];
        connecterV($id, $nom, $prenom, $statut);
        header('Location: index.php');
    }
    break;
default:
    include 'vues/v_connexion.php';
    break;
}
