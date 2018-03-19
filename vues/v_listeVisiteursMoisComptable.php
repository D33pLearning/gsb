<?php
/**
 * liste les mois et les visiteurs pour le comptable
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */
?>

<div class="container">
    <div class="row form-inline">
        <div class="col-md-4">
            <form action="index2.php?uc=validerFicheFrais&action=selectionnerMois" method="post" role="form">
                <label for="lstVisiteur">Choisir le visiteur :</label>
                <select id="lstVisiteur" name="lstVisiteur" onchange='this.form.submit()' class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        $id = $unVisiteur['id'];
                        if ($id == $visiteurSelectionne) {
                            ?>
                            <option selected value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </form>
        </div>
        <div class="col-md-auto">
            <form action=" index2.php?uc=validerFicheFrais&action=voirLesFraisClotures" method="post"
                  role="form">
                <input class="form-control" name="lstVisiteur" type="hidden" value="<?php echo $visiteurSelectionne ?>">
                <div class="row">
                    <label for="lstMois">Mois :</label>
                    <select id="lstMois" name="lstMois" class="form-control">
                        <?php
                        if (count($lesMois)) {
                            foreach ($lesMois as $unMois) {
                                $mois = $unMois['mois'];
                                $numAnnee = $unMois['numAnnee'];
                                $numMois = $unMois['numMois'];
                                if ($mois == $moisAselectionner) {
                                ?>
                                    <option selected value="<?php echo $mois ?>">
                                        <?php echo $numMois . '/' . $numAnnee ?> </option>
                                <?php
                                }else {
                                    ?>
                                    <option value="<?php echo $mois ?>">
                                        <?php echo $numMois . '/' . $numAnnee ?> </option>
                                    <?php
                                }
                            }
                        } else { ?>
                            <option value="0">Pas de fiche de frais à valider pour ce visiteur</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="col-md-auto">
                    <div class="col-md-1">
                        <input id="ok" type="submit" value="Valider" class="btn btn-success"
                               role="button">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

