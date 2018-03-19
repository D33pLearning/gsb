<?php
/**
 * Gestion de l'accueil du comptable
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */

if ($estConnecte) {
    include 'vues/v_accueilComptable.php';
}else{
    include 'vues/v_connexion.php';
}
