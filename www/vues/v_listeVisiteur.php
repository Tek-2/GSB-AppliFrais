<?php
/**
 * Vue Liste des visiteur
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
<form action="index.php?uc=validerFiche&action=forfaitDuMois"
      method="post" role="form">
    <div class="row">
        <div class="col-md-2">
            <h4>Choisir le visiteur : </h4>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) { //permet de decouper le tableau, chaq l du tableau c $unVisiteur
                        $id = $unVisiteur['id'];
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        if ($visiteur == $visiteurASelectionner) {
                            ?>
                            <option selected value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                                <?php
                        } else {
                            ?>
                            <option value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                                <?php
                        }
                    }
                    ?>    

                </select>
            </div>
        </div>

        <div class="col-md-1">
            <h4>Mois: </h4>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($listMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                                <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                                <?php
                        }
                    }
                    ?>    

                </select>
            </div>
        </div>
        <div class="col-md-3"> 
            <input type="submit" value="Valider" class="btn btn-success" 
                   role="button">
            
        </div>
    </div>
</form>