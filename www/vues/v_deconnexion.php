<?php
/**
 * Vue Déconnexion
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
deconnecter();
if (isset($_SESSION['idVisiteur'])){
?>
<div class="alert alert-info" role="alert">
    <p>Vous avez bien été déconnecté ! <a href="index.php">Cliquez ici</a>
        pour revenir à la page de connexion.</p>
</div>
<?php
header("Refresh: 2;URL=index.php");
}else{
    if (isset($_SESSION['idComptable'])){
        ?>
<div class="alert alert-deconnexionC" role="alert">
    <p>Vous avez bien été déconnecté ! <a href="index.php" style="color: #FF7F50">Cliquez ici</a>
        pour revenir à la page de connexion.</p>
</div>
<?php
header("Refresh: 2;URL=index.php");
    }
}
