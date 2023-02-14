<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>


<div class="col-md-4">
    <h2>Valider les fiches de frais</h2>       
</div>
<form action="index.php?uc=validerFrais&action=valider" 
      method="post" role="form">
    <div class="col-md-4">
        <div class="form-group">
            <br>
            <label for="lstVisiteur" accesskey="n"> Choisir le visiteur : </label>
            <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                <?php
                foreach ($lesVisiteurs as $unVisiteur) {
                    $nom = $unVisiteur['nom'];
                    $prenom = $unVisiteur['prenom'];
                    $id = $unVisiteur['id'];
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

    <div class="col-md-4">

        <div class="form-group">
            <br>
            <label for="lstMois" accesskey="n">Mois : </label>
            <select id="lstMois" name="lstMois" class="form-control">
                <?php
                foreach ($lstdouzdernmois as $unMois) {
                    $numAnnee = $unMois['numAnnee'];
                    $numMois = $unMois['numMois'];
                    if ($unMois == $moisASelectionner) {
                        ?>
                        <option selected value="<?php echo $unMois ?>">
                            <?php echo $unMois ?> </option>
                        <?php
                    } else {
                        ?>
                        <option value="<?php echo $unMois ?>">
                            <?php echo $unMois ?> </option>
                        <?php
                    }
                }
                ?>    

            </select>
        </div>


    </div>
    <input id="ok" type="submit" value="Valider" class="btn btn-success" 
           role="button">
    <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" 
           role="button">
    </div>
</form>



