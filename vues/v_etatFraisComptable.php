<?php
/**
 * vue frais comptable
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */
?>
<div class="row">    
    <h2>Valider la fiche de frais </h2>
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index2.php?uc=validerFicheFrais&action=majLesFrais"
              role="form">
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
                <button class="btn btn-success" type="submit" name="corrigerLesFrais">Corriger</button>
                <button class="btn btn-danger" type="reset">Réinitailiser</button></p>
            </fieldset>
        </form>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">Descriptif des éléments hors forfait - 
        <?php echo $nbJustificatifs ?> justificatifs reçus</div>
		<form method="post" 
              action="index2.php?uc=validerFicheFrais&action=majLesFrais" 
              role="form">
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class="montant">Montant</th>
        </tr>
        <?php
        
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $idFrais = $unFraisHorsForfait['id'];
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant'];
             ?>
            <tr>
                <form method="post" 
              action="index2.php?uc=validerFicheFrais&action=majLesFrais" 
              role="form">
                <input class="form-control" name="idFrais" type="hidden" value="<?php echo $idFrais ?>">
                        <td>
                            <input type="text" id="txtDateHF"
                                   name="dateFrais"
                                   value="<?php echo $date ?>"
                                   class="form-control">
                        </td>
                        <td>
                            <input type="text" id="txtLibelleHF"
                                   name="libelle"
                                   value="<?php echo $libelle?>"
                                   class="form-control">
                        </td>
                        <td>
                            <input type="text" id="txtMontantHF"
                                   name="montant"
                                   value="<?php echo $montant ?>"
                                   class="form-control">
                        </td>
                <td><button class="btn btn-success" type="submit" name="corrigerHF">Corriger</button> 
                    <button class="btn btn-danger" type="reset" name="reinitialiser">Réinitailiser</button>
                    <button class="btn btn-danger" type="submit" name="refuser">Refuser</button> 
                    <button class="btn btn-danger" type="submit" name="reporter">Reporter</button><td>
                </form>
            </tr>
            <?php
        }
        ?>
    </table>
   
</div>
<form method="post" 
              action="index2.php?uc=validerFicheFrais&action=majLesFrais" 
              role="form">
<button class="btn btn-success" type="submit" name="valider">Valider</button>

</form>
</div>