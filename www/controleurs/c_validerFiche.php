<?php

/**
 * Gestion du suivi de paiement
 *
 * @author Hatslah'a
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

$lesVisiteurs = $pdo->getLesVisiteurs();
$moisActuel = getMois(date('d/m/Y'));
$listMois = getDouzeDerniersMois($moisActuel);

switch ($action) {

    case 'selectionnerVisiteur':
        $lesCles[] = array_keys($lesVisiteurs);
        $visiteurASelectionner = $lesCles[0];
        $lesCles1[] = array_keys($listMois);
        $moisASelectionner = $lesCles1[0];
        include 'vues/v_listeVisiteur.php';
        break;

    case 'forfaitDuMois':
        $idVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
        $moisV = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);

        $condition = $pdo->estPremierFraisMois($idVisiteur, $moisV);
        if (!$condition) {
            $visiteurASelectionner = $idVisiteur;
            $moisASelectionner = $moisV;
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $moisV);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $moisV);
            $nbJustificatifs = $pdo->getNbjustificatifs($idVisiteur, $moisV);
            include 'vues/v_validerFiche.php';
        } else {
            ajouterErreur('Aucun frais enregistré pour ce visiteur pour le mois séléctionné');
            include 'vues/v_erreurs.php';
            header("Refresh: 2;URL=index.php?uc=validerFiche&action=selectionnerVisiteur");
        }
        break;

    case 'correctionForfait' :
        $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
        $idVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
        $moisV = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'dateHF', FILTER_SANITIZE_STRING);
        $libelle = filter_input(INPUT_POST, 'libelleHF', FILTER_SANITIZE_STRING);
        $montant = filter_input(INPUT_POST, 'montantHF', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'idFHF', FILTER_SANITIZE_STRING);

        $visiteurASelectionner = $idVisiteur;
        $moisASelectionner = $moisV;
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $moisV);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $moisV);
        $nbJustificatifs = $pdo->getNbjustificatifs($idVisiteur, $moisV);

        if (isset($_POST['corrigerForfait'])) {
            $pdo->majFraisForfait($idVisiteur, $moisV, $lesFrais);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $moisV);
            ajouterErreur('Votre mise a jour forfait à bien été prise en compte');
            include 'vues/v_erreurs.php';
            include 'vues/v_validerFiche.php';
            
        } elseif (isset($_POST['corrigerFHF'])) {
            $montant = filter_input(INPUT_POST, 'montantHF', FILTER_SANITIZE_STRING);
            $pdo->majFraisHorsForfait($idVisiteur, $moisV, $date, $montant, $libelle);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $moisV);
            ajouterErreur('Votre mise a jour hors forfait à bien été prise en compte');
            include 'vues/v_erreurs.php';
            include 'vues/v_validerFiche.php';
            
        } elseif (isset($_POST['reporterFHF'])) {
            $libelle = 'Refusé ' . $libelle;
            $condition = $pdo->estPremierFraisMois($idVisiteur, $moisActuel);
            var_dump($condition,$idVisiteur, $moisActuel, $libelle, $date, $montant);
            if ($condition) {
                $pdo->creeNouvellesLignesFrais($idVisiteur, $moisActuel);
            }
            $mois = $moisActuel;
            $pdo->creeNouveauFraisHorsForfait($idVisiteur, $mois, $libelle, $date, $montant); 
            //$pdo->supprimerFraisHorsForfait($id);
            ajouterErreur('le frais hors forfait à bien été reporté');
            include 'vues/v_erreurs.php';
            include 'vues/v_validerFiche.php';
        }
        
        elseif(isset($_POST['validerFiche'])){
            $etat='VA';
            $pdo->majEtatFicheFrais($idVisiteur, $moisV, $etat);
            //$pdo->majNbJustificatifs($idVisiteur, $moisV, $nbJustificatifs);
            $sommeHF=$pdo->getMontantHF($idVisiteur,$moisV);
            $totalHF=$sommeHF[0][0];
            $sommeFF=$pdo->getMontantFF($idVisiteur,$moisV);
            $totalFF=$sommeFF[0][0];
            $montantTotal=$totalHF+$totalFF;
            $pdo->majTotal($idVisiteur,$moisV,$montantTotal);
            include 'vues/v_retourAccueil.php';
        }
        break;
}


