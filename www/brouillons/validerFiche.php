<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>

 

<form method="post" action="index.php?uc=validerFrais&action=validerfrais">
 <div class="row" >              
<div class="col-md-4">
            <label for="listeVisiteur" accesskey="n">Choisir le visiteur : </label>
                <select id="listeVisiteur" name="listeVisiteur" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        if ($id == $VisiteurASelectionner) {
                            ?>
                           <option selected value="<?php echo $id ?>">
                                <?php echo $nom . '/' . $prenom ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $id ?>">
                                <?php echo $nom . '/' . $prenom ?> </option>
                            <?php
                        }
                    }
                    ?>    
                </select>
       
     </div>
<div class="col-md-4">
            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois;
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $unMois ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $unMois ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </div>
    </div>
   
 </div>
<div class="row" >    
    <div class="col-md-4">
    <h2 style ="color : #FFB233">Valider la fiche de Frais
    </h2>
    <h3>Eléments forfaitisés</h3>
            <fieldset>      
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite']; ?>
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
               
                 <input id="corrigerFF" name="corrigerFF" class="btn btn-success"
                        type="submit" value="Corriger" />
               
                 <input id="reinitialiser" name="reinitialiser" class="btn btn-danger"
                        type="reset" value="Réinitialiser" />
               
                   
            </fieldset>
    </div>
</div>
<br>
<br>
<br>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading" style ="background-color : #FFB233; color:white" >Descriptif des éléments hors forfait</div>
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
                $id = $unFraisHorsForfait['id']; ?>          
                <tr>
                 
                        <td> <input type="text" id="iddate"
                               name="date"
                               size="20" maxlength="10"
                               value="<?php echo $date ?>"></td>
                        <td><input type="text" id="idlibelle"
                               name="libelle"
                               size="20" maxlength="10"
                               value="<?php echo $libelle ?>"></td>
                        <td><input type="text" id="idmontant"
                               name="montant"
                               size="20" maxlength="10"
                               value="<?php echo $montant ?>"></td>
                        <td><input id="validerFHF" name="validerFHF" class="btn btn-success"
                                   type="submit" value="Valider" />
                        <input id="reporterFHF" name="reporterFHF" class="btn btn-danger"
                               type="submit" value="Reporter" /></td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>
</div>
<div>
    <label> Nombres de justificatifs:
        <input class="form-control" size="10"
                     name="login" type="text" maxlength="10"
                     value="<?php echo $nombresJustificatifs ?>"></label>
       
            <br><input id="validerFIN" name="validerFIN" class="btn btn-success"
                        type="submit" value="Valider" />
</div>
</form>