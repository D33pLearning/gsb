<?php
/**
 * Gestion deconnexion comptable
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
case 'demandeDeconnexion':
    include 'vues/v_deconnexionComptable.php';
    break;
case 'valideDeconnexion':
    if (estConnecte()) {
        include 'vues/v_deconnexionComptable.php';
    } else {
        ajouterErreur("Vous n'êtes pas connecté");
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    }
    break;
default:
    include 'vues/v_connexion.php';
    break;
}
