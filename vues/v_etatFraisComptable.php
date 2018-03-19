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
                <input type="submit" value="Corriger" class="btn btn-success"
                               role="button">
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
            <th class='montant'>Montant</th>                
        </tr>
        <?php
        
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant'];
            $idFrais = $unFraisHorsForfait['id']; ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
		<td><button class="btn btn-success" type="submit">Corriger</button> <button class="btn btn-danger" type="reset">Réinitailiser</button>
                <button class="btn btn-danger" type="submit">Refuser</button> <button class="btn btn-danger" type="submit">Reporter</button><td>
            </tr>
            <?php
        }
        ?>
    </table>
   </form>
</div>
<div class="row">

<p>Nombre de Justificatifs : <input type="text"></p> 
<button class="btn btn-success" type="submit">Valider</button>
<button class="btn btn-danger" type="reset">Réinitailiser</button>

</div>