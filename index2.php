<?php
/**
 * Index comptable du projet GSB (comptable)
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */

require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
require 'vues/v_enteteComptable.php';

$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}

if ($uc != 'validerFicheFrais') {
    if (isset($_SESSION['idVisiteur'])) {
        unset($_SESSION['idVisiteur']);
    }
    if (isset($_SESSION['mois'])) {
        unset($_SESSION['mois']);
    }
}
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueilComptable.php';
    break;
case 'validerFicheFrais':
    include 'controleurs/c_validerFicheFrais.php';
    break;
case 'suiviPaiementFichesFrais':
    include 'controleurs/c_suiviPaiementFichesFrais.php';
    break;
case 'gererFraisComptable':
    include 'controleurs/c_gererFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexionComptable.php';
    break;
}
require 'vues/v_pied.php';


//include 'controleurs/c_accueilComptable.php';

