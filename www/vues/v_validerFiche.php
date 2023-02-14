<?php
/**
 * Vue Liste des forfait des mois
 *
 */
?>

<div class="row"> 
    <form action="index.php?uc=validerFiche&action=correctionForfait"
          method="post" role="form">
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
                        if ($id == $visiteurASelectionner) {
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
        </br></br></br>

        <div style="color:#FF7F50">
            <h2>Valider la fiche de frais</h2>
        </div>
        <div class="row"> 
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
                    <input id="validerForfait" name="corrigerForfait" type="submit" value="Corriger" class="btn btn-success"/>
                    <input id="reporterForfait" name="reinitialiserForfait" type="reset" value="Réinitialiser" class="btn btn-danger"/>
                    <!--  <input id="soumission-1" name="correction1" type="submit" value="Valider">
        <input class="btn btn-danger" type="reset">Réinitialiser</input>-->
                </fieldset>
            </div>
        </div>
    
    </br></br><hr>
    <div class="row">
        <div class="panel panel-warning">
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
                            <td><input class="form-control" value='<?php echo $date ?>' name="dateHF" type="text" maxlength="10"></input></td>
                            <td><input class="form-control" value='<?php echo $libelle ?>' name="libelleHF" type="text" maxlength="10"></input></td>
                            <td><input class="form-control" value='<?php echo $montant ?>' name="montantHF" type="text" maxlength="10"></input>
                                <input class="form-control" value='<?php echo $id ?>' name="idFHF" type="hidden" maxlength="10"></input></td>
                            <td>
                                <input id="validerFHF" name="corrigerFHF" type="submit" value="Corriger" class="btn btn-success"/>
                                <input id="reporterFHF" name="reporterFHF" type="submit" value="Reporter" class="btn btn-danger"/>

                                <!-- <a href="index.php?uc= &action= " 
                                   role="button">
                                    <button class="btn btn-success" type="submit">Valider</button></a>
                                <a href="index.php?uc= &action= " 
                                   role="button">
                                    <button class="btn btn-danger" type="submit">Reporter</button></a>-->
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>  
            </table>
        </div>
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
            <input id="validerFiche" name="validerFiche" type="submit" value="Valider" class="btn btn-success"/>
    <!--<input class="btn btn-success" type="submit">Valider</input></a>
    <input class="btn btn-danger" type="reset">Réinitialiser</input> -->
    </div>
    <br>
    </form>
</div>

