<?php
session_name('IF-ADMIN');
session_start();

include('config.php');

header('Content-Type: application/json');




/* ____________________________________________________________________________________________________
							Serveur Rest auteur Rayan Kemayou Deugoue & Cecilia wangue

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

Copyright Ket-Up project IF-ADMIN

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
				$_SESSION['User'] = $liste;
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
		case 'GetSessions':
				$sql="SELECT * FROM `sesion` WHERE 1";
				$req3=$BDD->prepare($sql);
			        $req3->execute();
			        $reponse = array();
			        $liste =  array();
					while($data3=$req3->fetch()){
					$reponse = array_map("utf8_decode", $data3);
					array_push( $liste,array('Session' => $reponse));
					}
					$retour = array();
					if (empty($liste)) {
						$retour["status"] = false;
					}
					else {
						$retour["status"] = true;
					}
					
					$retour["result"]["Sessions"] = $liste;
					echo json_encode($retour);  
				break;

		case 'GetStudents':
		$Session_parcour = (isset($_POST['Session_parcour'])? $_POST['Session_parcour']: (isset($_GET['Session_parcour'])? $_GET['Session_parcour']:9));

			$sql="SELECT etudiant.*, parcour_etudiant.*, filiere.cycle FROM etudiant, parcour_etudiant, filiere WHERE etudiant.id = parcour_etudiant.ID_ETUDIANT AND parcour_etudiant.ID_SESSION =".$Session_parcour." AND parcour_etudiant.ID_FILIERE = filiere.id";
				$req3=$BDD->prepare($sql);
			        $req3->execute();
			        $reponse = array();
			        $liste =  array();
					while($data3=$req3->fetch()){
					$reponse = array_map("utf8_decode", $data3);
					array_push( $liste,array('Student' => $reponse));
					}
					$retour = array();
					if (empty($liste)) {
						$retour["status"] = false;
					}
					else {
						$retour["status"] = true;
					}
					
					$retour["result"]["Students"] = $liste;
					echo json_encode($retour);  
				break;

		case 'Matiere_prof':
		$ID_PARCOUR = (isset($_POST['ID_PARCOUR'])? $_POST['ID_PARCOUR']: (isset($_GET['ID_PARCOUR'])? $_GET['ID_PARCOUR']:9));

			$sql="SELECT matiere.*, filiere.cycle FROM matiere, filiere WHERE matiere.prof = ".$ID_PARCOUR." AND matiere.classe = filiere.id";
				$req3=$BDD->prepare($sql);
			        $req3->execute();
			        $reponse = array();
			        $liste =  array();
					while($data3=$req3->fetch()){
					$reponse = array_map("utf8_decode", $data3);
					array_push( $liste,array('Matiere' => $reponse));
					}
					$retour = array();
					if (empty($liste)) {
						$retour["status"] = false;
					}
					else {
						$retour["status"] = true;
					}
					
					$retour["result"]["Matieres"] = $liste;
					echo json_encode($retour);  
				break;


			case 'Matieres':

			$sql="SELECT * FROM matiere WHERE 1";
				$req3=$BDD->prepare($sql);
			        $req3->execute();
			        $reponse = array();
			        $liste =  array();
					while($data3=$req3->fetch()){
					$reponse = array_map("utf8_decode", $data3);
					array_push( $liste,array('Matiere' => $reponse));
					}
					$retour = array();
					if (empty($liste)) {
						$retour["status"] = false;
					}
					else {
						$retour["status"] = true;
					}
					
					$retour["result"]["Matieres"] = $liste;
					echo json_encode($retour);  
				break;

		case 'AddEtudiant':

		$Filiere = (isset($_POST['Filiere'])? $_POST['Filiere']: (isset($_GET['Filiere'])? $_GET['Filiere']:null));

		$Civilite = (isset($_POST['Civilite'])? $_POST['Civilite']: (isset($_GET['Civilite'])? $_GET['Civilite']:null));

		$Nom = (isset($_POST['Nom'])? $_POST['Nom']: (isset($_GET['Nom'])? $_GET['Nom']:null));

		$Prenom = (isset($_POST['Prenom'])? $_POST['Prenom']: (isset($_GET['Prenom'])? $_GET['Prenom']:null));

		$DateNais = (isset($_POST['DateNais'])? $_POST['DateNais']: (isset($_GET['DateNais'])? $_GET['DateNais']:null));

		$LieuNais = (isset($_POST['LieuNais'])? $_POST['LieuNais']: (isset($_GET['LieuNais'])? $_GET['LieuNais']:null));

		$PaysNais = (isset($_POST['PaysNais'])? $_POST['PaysNais']: (isset($_GET['PaysNais'])? $_GET['PaysNais']:null));

		$Nation = (isset($_POST['Nation'])? $_POST['Nation']: (isset($_GET['Nation'])? $_GET['Nation']:null));

		$Adresse = (isset($_POST['Adresse'])? $_POST['Adresse']: (isset($_GET['Adresse'])? $_GET['Adresse']:null));

		$Telephone = (isset($_POST['Telephone'])? $_POST['Telephone']: (isset($_GET['Telephone'])? $_GET['Telephone']:null));

		$Email = (isset($_POST['Email'])? $_POST['Email']: (isset($_GET['Email'])? $_GET['Email']:null));

		$LastDip = (isset($_POST['LastDip'])? $_POST['LastDip']: (isset($_GET['LastDip'])? $_GET['LastDip']:null));

		$Etabli = (isset($_POST['Etabli'])? $_POST['Etabli']: (isset($_GET['Etabli'])? $_GET['Etabli']:null));

		$Mension = (isset($_POST['Mension'])? $_POST['Mension']: (isset($_GET['Mension'])? $_GET['Mension']:null));

		$PaysObten = (isset($_POST['PaysObten'])? $_POST['PaysObten']: (isset($_GET['PaysObten'])? $_GET['PaysObten']:null));

		$AnneeObten = (isset($_POST['AnneeObten'])? $_POST['AnneeObten']: (isset($_GET['AnneeObten'])? $_GET['AnneeObten']:null));

		$Handicape = (isset($_POST['Handicape'])? $_POST['Handicape']: (isset($_GET['Handicape'])? $_GET['Handicape']:null));

		$Divertis = (isset($_POST['Divertis'])? $_POST['Divertis']: (isset($_GET['Divertis'])? $_GET['Divertis']:null));

		$Annee = (isset($_POST['Annee'])? $_POST['Annee']: (isset($_GET['Annee'])? $_GET['Annee']:null));

		$SessionI = (isset($_POST['SessionI'])? $_POST['SessionI']: (isset($_GET['SessionI'])? $_GET['SessionI']:null));

		$sql1 = "SELECT * FROM `etudiant` WHERE 1 ORDER BY id DESC LIMIT 1 ;";
        $req5=$BDD->prepare($sql1);
        $req5->execute();
     	$data3=$req5->fetch();
        $rang = $data3['id'];
      	
		$Matricule = ($rang+1).substr($Nom, 0,1).substr($Prenom, 0,1).substr($Annee, -2).$Filiere ;

		$sql="INSERT INTO `etudiant`(`id`, `matricule`, `nom`, `prenom`, `civilite`, `daten`, `lieun`, `paysn`, `nation`, `tel`, `email`, `adresse`, `diplome`, `mention`, `dated`, `ecoled`, `paysd`, `diver`, `handicape`, `filiere`, `annee`, `mention_finale`, `pourcentage`, `session`) VALUES (null,'".$Matricule."','".$Nom."','".$Prenom."','".$Civilite."','".$DateNais."','".$LieuNais."','".$PaysNais."','".$Nation."','".$Telephone."','".$Email."','".$Adresse."','".$LastDip."','".$Mension."','".$AnneeObten."','".$Etabli."','".$PaysObten."','".$Divertis."','".$Handicape."',".$Filiere.",'".$Annee."',5,00,0)";
		$req3=$BDD->prepare($sql);
		$req3->execute();

		$sql1="INSERT INTO `parcour_etudiant`(`ID_PARCOUR`, `ID_ETUDIANT`, `ID_SESSION`, `ID_FILIERE`, `POURCENTAGE`, `ID_MENTION_FINALE`) VALUES (null,".($rang+1).",".$SessionI.",".$Filiere.",0,5);";
		$req31=$BDD->prepare($sql1);
		$req31->execute();

		$retour = array();
		$retour["status"] = true;
		echo json_encode($retour);  
		break;

		case 'AddEnseignant':

		$Civilite = (isset($_POST['Civilite'])? $_POST['Civilite']: (isset($_GET['Civilite'])? $_GET['Civilite']:null));

		$Nom = (isset($_POST['Nom'])? $_POST['Nom']: (isset($_GET['Nom'])? $_GET['Nom']:null));

		$Prenom = (isset($_POST['Prenom'])? $_POST['Prenom']: (isset($_GET['Prenom'])? $_GET['Prenom']:null));

		$DateNais = (isset($_POST['DateNais'])? $_POST['DateNais']: (isset($_GET['DateNais'])? $_GET['DateNais']:null));

		$LieuNais = (isset($_POST['LieuNais'])? $_POST['LieuNais']: (isset($_GET['LieuNais'])? $_GET['LieuNais']:null));

		

		$Adresse = (isset($_POST['Adresse'])? $_POST['Adresse']: (isset($_GET['Adresse'])? $_GET['Adresse']:null));

		$Telephone = (isset($_POST['Telephone'])? $_POST['Telephone']: (isset($_GET['Telephone'])? $_GET['Telephone']:null));

		$Email = (isset($_POST['Email'])? $_POST['Email']: (isset($_GET['Email'])? $_GET['Email']:null));

		

		$Handicape = (isset($_POST['Handicape'])? $_POST['Handicape']: (isset($_GET['Handicape'])? $_GET['Handicape']:null));

		$Divertis = (isset($_POST['Divertis'])? $_POST['Divertis']: (isset($_GET['Divertis'])? $_GET['Divertis']:null));

		$Annee = (isset($_POST['Annee'])? $_POST['Annee']: (isset($_GET['Annee'])? $_GET['Annee']:null));

		$SessionI = (isset($_POST['SessionI'])? $_POST['SessionI']: (isset($_GET['SessionI'])? $_GET['SessionI']:null));

		$sql1 = "SELECT * FROM `prof` WHERE 1 ORDER BY id DESC LIMIT 1 ;";
        $req5=$BDD->prepare($sql1);
        $req5->execute();
     	$data3=$req5->fetch();
        $rang = $data3['id'];
      	
		$Pass = ($rang+1).substr($Annee, -2)."PW" ;

		$sql="INSERT INTO `prof`(`id`, `nom`, `prenom`, `tel`, `email`, `adresse`, `handicape`, `diver`, `civilite`, `pass`, `poste`, `annee`) VALUES (null,'".$Nom."','".$Prenom."','".$Telephone."','".$Email."','".$Adresse."','".$Handicape."','".$Divertis."','".$Civilite."','".md5($Pass)."','enseignant','".$Annee."')";
		$req3=$BDD->prepare($sql);
		$req3->execute();

		$sql1="INSERT INTO `parcour_prof`(`ID_PARCOUR`, `ID_PROF`, `ANNEE_PARCOUR`, `POSTE_PROF`) VALUES (null,".($rang+1).",'".$Annee."','enseignant')";
		$req31=$BDD->prepare($sql1);
		$req31->execute();

		$retour = array();
		$retour["status"] = true;
		echo json_encode($retour);  
		break;

		/* ____________________________________   Default action   ______________________________________________________ */
		default:

		break;

	}
}	    
?>