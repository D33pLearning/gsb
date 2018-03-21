<?php
    function connectionPDO() {
	$login = "userGsb";
	$mdp = "secret";
	$bd = "gsb_frais";
	$serveur = "localhost";
	try{
		$conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp);
                return $conn;
	}catch (PDOException $e){
		print "Erreur de connection PDO";
		die();
        }
	
}
?>