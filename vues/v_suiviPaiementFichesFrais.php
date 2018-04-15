<?php
/**
 * controleur qui suit le paiement des frais pour le comptable
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */
 
?>
<hr>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="idEtat">Etat</th>
                    <th class="montantValide">Montant</th>  
                    <th class="libelle">Libelle</th>   
                </tr>
            </thead>  
            <tbody>
            <?php
            foreach ($lesFiches as $uneFiche) {
                $idEtat = $uneFiche['idEtat'];
                $montantValide = $uneFiche['montantValide'];
                $libelle = $uneFiche['libelle'];
                ?>           
                <tr>
                    <td> <?php echo $idEtat ?></td>
                    <td> <?php echo $montantValide ?></td>
                    <td><?php echo $libelle ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>
</div>