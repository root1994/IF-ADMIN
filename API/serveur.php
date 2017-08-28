<?php
session_name("IF-ADMIN");
session_start();

include('config.php');

header('Content-Type: application/json');




/* ____________________________________________________________________________________________________
							Serveur Rest auteur Rayan Kemayou Deugoue 

								Accepted Methode: Get & POST
								Type Anser: JSON (only)


											ReadMe
											______


1- une action est envoyer et stocker elle doit se bracher a une case du switch

2- en fonction de la case le serveur demande ou non d'avantage de données

3- par la suite il effectue les series d'operation sur la bd (avec toute le precision et la delicatesse)
		afin de fournir un resultat obtimal pour le client
4- le client au travers d'un service ou d'un provider ou encore d'une factory recuperer le resultat 
		ici enpacketer en Javascript Object (json) 

Copyright Ket-Up project IF-ADMIN Colaboration Like Concept

_______________________________________________________________________________________________________ */




$action = (isset($_POST['action'])? $_POST['action']: (isset($_GET['action'])? $_GET['action']:null ));

if ($action) {

	switch ($action) {

		case 'start':
			echo json_encode('APPLICATION BIEN DEPLOYER');
		break;

		case 'GetUser':
			$EMAIL_PROF = (isset($_POST['EMAIL_PROF'])? $_POST['EMAIL_PROF']: (isset($_GET['EMAIL_PROF'])? $_GET['EMAIL_PROF']:null));

			$PASS_PROF = (isset($_POST['PASS_PROF'])? $_POST['PASS_PROF']: (isset($_GET['PASS_PROF'])? $_GET['PASS_PROF']:null));

			$req3=$BDD->prepare("SELECT prof.*, parcour_prof.* FROM prof, parcour_prof, sesion WHERE prof.pass = '".md5($PASS_PROF)."'  AND prof.email = '".$EMAIL_PROF."'  AND prof.id = parcour_prof.ID_PROF AND sesion.etat = 'active' AND parcour_prof.ANNEE_PARCOUR = sesion.annee");
	        $req3->execute();
	        $reponse = array();
	        $liste =  array();
			while($data3=$req3->fetch()){
			$reponse = array_map("utf8_decode", $data3);
			array_push( $liste,array('User' => $reponse));
			}
			$retour = array();
			if (empty($liste)) {
				$retour["status"] = false;
			}
			else {
				$retour["status"] = true;
			}
			
			$retour["result"]["Users"] = $liste;
			echo json_encode($retour);   
		break;

		case 'GetProfs':
		$sql="SELECT prof.*, parcour_prof.* FROM prof, parcour_prof, sesion WHERE  prof.id = parcour_prof.ID_PROF AND sesion.etat = 'active' AND parcour_prof.ANNEE_PARCOUR = sesion.annee";
		$req3=$BDD->prepare($sql);
	        $req3->execute();
	        $reponse = array();
	        $liste =  array();
			while($data3=$req3->fetch()){
			$reponse = array_map("utf8_decode", $data3);
			array_push( $liste,array('User' => $reponse));
			}
			$retour = array();
			if (empty($liste)) {
				$retour["status"] = false;
			}
			else {
				$retour["status"] = true;
			}
			
			$retour["result"]["Users"] = $liste;
			echo json_encode($retour);  
		break;



		/* ____________________________________   Default action   ______________________________________________________ */
		default:

		break;

	}
}	    
?>