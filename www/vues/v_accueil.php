<?php
/**
 * Vue Accueil
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
?>
<?php
    $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
          if (isset($_SESSION['idVisiteur'])) {
                ?>
<div id="accueil">
    <h2>
        Gestion des frais<small> - Visiteur : 
            <?php 
            echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']
            ?></small>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-bookmark"></span>
                    Navigation
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <a href="index.php?uc=gererFrais&action=saisirFrais"
                           class="btn btn-success btn-lg" role="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                            <br>Renseigner la fiche de frais</a>
                        <a href="index.php?uc=etatFrais&action=selectionnerMois"
                           class="btn btn-primary btn-lg" role="button">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <br>Afficher mes fiches de frais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
          } if (isset($_SESSION['idComptable'])) {
         ?>
<div id="accueil">
    <h2>
        Gestion des frais<small> - Comptable : 
            <?php 
            echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']
            ?></small>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primaryc">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-export"></span>
                    Gestion du comptable
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <a href="index.php?uc=validerFiche&action=selectionnerVisiteur"
                           class="btn btn-success btn-lg" role="button">
                            <span class="glyphicon glyphicon-ok"></span>
                            <br>Valider la fiche de frais</a>
                        <a href="index.php?uc=suivrePaiement&action=choixFiche"
                           class="btn btn-lg" style="background-color:#ff7f50; border-color:#ff7f50; color:#fff"  role="button">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <br>Suivre le paiement des fiches de frais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
          }
          ?>