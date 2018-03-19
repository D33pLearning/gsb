<?php
/**
 * vue deconnexion du comptable
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */
deconnecter();
?>
<div class="alert alert-info" role="alert">
    <p>Vous avez bien été déconnecté ! <a href="index2.php">Cliquez ici</a>
        pour revenir à la page de connexion.</p>
</div>
<?php
header("Refresh: 3;URL=index2.php");
