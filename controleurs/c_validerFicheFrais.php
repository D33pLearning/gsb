<?php
/**
 * controleur qui valide une fiche de frais
 * @category  PPE
 * @package   GSB
 * @author    Jérémy FEVRE
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$lesVisiteurs = $pdo->getLesVisiteurs();

// on utilise des super globales pour ne pas perdre de valeurs
if (isset($_SESSION['idVisiteur'])) {
    $visiteurSelectionne = $_SESSION['idVisiteur'];
}
if (isset($_SESSION['mois'])) {
    $moisASelectionner = $_SESSION['mois'];
}

switch ($action) {
	
case 'selectionnerMois':

	
    //si la liste des visiteurs n'est pas vide et pas de visiteur sélectionné
        if (count($lesVisiteurs) && !isset($_POST['lstVisiteur'])) {
            //on affecte le premier visiteur de la liste à visiteurSelectionne
            $visiteurSelectionne = $lesVisiteurs[0]['id'];
        }
        // si un visiteur est sélectionné
        if (isset($_POST['lstVisiteur'])) {
            // on récupère la valeur
            $visiteurSelectionne = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
            $_SESSION['idVisiteur'] = $visiteurSelectionne;
        }
        //si la valeur récupérée est vraie
        if ($visiteurSelectionne) {
            //on charge la liste de mois pour le visiteur sélectionné
            $lesMois = $pdo->getLesMoisDesFichesParEtat($visiteurSelectionne,'CL');
            //on récupére les cles du tableau de mois
            $lesCles = array_keys($lesMois);
            //si il y'a des cles la liste n'est pas vide
        if ($lesCles) {
                //on affecte le premier mois de la liste à moisASelectionner
                $moisASelectionner = $lesCles[0];
                $_SESSION['mois'] = $moisASelectionner;
            }
        }
        include 'vues/v_listeVisiteursMoisComptable.php';
        break;
		
case 'voirLesFraisClotures' :

    // on récupère le visiteur
    $visiteurSelectionne = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
    $_SESSION['idVisiteur'] = $visiteurSelectionne;
    $moisASelectionner = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $_SESSION['mois'] = $moisASelectionner;
    $lesMois = $pdo->getLesMoisDesFichesParEtat($visiteurSelectionne,'CL');
    
    // On récupère les frais 
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($visiteurSelectionne, $moisASelectionner);
    $lesFraisForfait = $pdo->getLesFraisForfait($visiteurSelectionne, $moisASelectionner);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($visiteurSelectionne, $moisASelectionner);
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    include 'vues/v_listeVisiteursMoisComptable.php';
    include 'vues/v_etatFraisComptable.php';
    break;      

case 'majLesFrais' :
    
    // on récupère le visiteur
    // on identifie chaque cas de mises à jour pour effectuer les modifications nécessaires
    
    if (isset($_POST['corrigerHF'])) {
         
        // on vérifie si un frais hors forfait a été modifié
        
        
        $pdo->majFraisForfait($visiteurSelectionne, $moisASelectionner, $nvFrais);
    }
       
    if (isset($_POST['corrigerLesFrais'])) {
        
       // on modifie les frais forfait
       //$idFrais = filter_input(INPUT_POST, 'idFrais', FILTER_SANITIZE_STRING);
       //$lesNouveauFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_SANITIZE_STRING);
       
       //$pdo->majFraisForfait($visiteurSelectionne, $moisASelectionner, $lesNouveauFrais);
        
    }
    if (isset($_POST['refuser'])) {
           
       // on vérifie si un frais a été refusé
       // on récupère l'id du frais
       // on modifie son libellé
     $idFrais = filter_input(INPUT_POST, 'idFrais', FILTER_SANITIZE_STRING);
     $pdo->majFraisHFRefuse($idFrais);
    }
    if (isset($_POST['reporter'])) {
        
        // on vérifie si un frais a été reporté
    }
    
    // on charge mois
    $lesMois = $pdo->getLesMoisDesFichesParEtat($visiteurSelectionne,'CL');
    include 'vues/v_listeVisiteursMoisComptable.php';
    
    // on charge les frais
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($visiteurSelectionne, $moisASelectionner);
    $lesFraisForfait = $pdo->getLesFraisForfait($visiteurSelectionne, $moisASelectionner);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($visiteurSelectionne, $moisASelectionner);
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    include 'vues/v_etatFraisComptable.php';
    break;
   
}

	