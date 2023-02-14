
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
<form>
    

            <div class="col-md-2">
                <h4>Choisir le visiteur : </h4>
            
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
          
                <h4>Mois: </h4>
            
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
            <h3>Eléments forfaitisés</h3>
            <div class="col-md-4">

                <fieldset>       
                    <?php
                    foreach ($lesFraisForfait as $unFrais) {
                        $idFrais = $unFrais['idfrais'];
                        $libelle = htmlspecialchars($unFrais['libelle']);
                        $quantite = $unFrais['quantite'];
                        ?>
                        <div class="form-group">
                            <label for="idFrais"><?php echo $libelle ?></label>
                            <input type="text" id="idFrais" 
                                   name="lesFrais[<?php echo $idFrais ?>]"
                                   size="10" maxlength="5" 
                                   value="<?php echo $quantite ?>" 
                                   class="form-control">
                        </div>
                        <?php
                    }
                    ?>
                    <input id="validerForfait" name="validerForfait" type="submit" value="Valider" class="btn btn-success"/>
                    <input id="reporterForfait" name="reporterForfait" type="reset" value="Réinitialiser" class="btn btn-danger"/>
                </fieldset>

            </div>
            <hr>

            <div class="panel panel-info">
                <div class="panel-heading">Descriptif des éléments hors forfait</div>
                <table class="table table-bordered table-responsive">  
                    <thead>
                        <tr>
                            <th class="date">Date</th>
                            <th class="libelle">Libellé</th>  
                            <th class="montant">Montant</th>  
                            <th class="action">&nbsp;</th> 
                        </tr>
                    </thead>  
                    <tbody>
                        <?php
                        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                            $date = $unFraisHorsForfait['date'];
                            $montant = $unFraisHorsForfait['montant'];
                            $id = $unFraisHorsForfait['id'];
                            ?>           
                            <tr>
                                <td><input class="form-control" value=<?php echo $date ?> name="login" type="text" maxlength="10"></input></td>
                                <td><input class="form-control" value=<?php echo $libelle ?> name="login" type="text" maxlength="10"></input></td>
                                <td><input class="form-control" value=<?php echo $montant ?> name="login" type="text" maxlength="10"></input></td>
                                <td>
                                    <input id="validerFHF" name="validerFHF" type="submit" value="Valider" class="btn btn-success"/>
                                    <input id="reporterFHF" name="reporterFHF" type="submit" value="Reporter" class="btn btn-danger"/></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>  
                </table>
            </div>
            <label for="nbJustificatifs">Nombres de justificatifs</label>

            <input type="text" id="nbJustificatifs" 
                   name="nbJustificatifs"
                   size="8" maxlength="5" 
                   value="<?php echo $nbJustificatifs ?>" >

            <br>
            <div>
                <a href="index.php?uc=validerFiche&action= " 
                   role="button">
                    <input id="validerNbJ" name="validerNbJ" type="submit" value="Valider" class="btn btn-success"/>
                    <input id="reporterNbJ" name="reinitialiserNbJ" type="reset" value="Réinitialiser" class="btn btn-danger"/>
            </div>
        
</form>