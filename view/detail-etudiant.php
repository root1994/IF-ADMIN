<?php
session_name('IF-ADMIN');
session_start();
?>
<!DOCTYPE html>
<html ng-app="IF-ADMIN">


<head>
	<meta name="viewport">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="../res/Metro-UI-CSS-master/build/css/metro.css" rel="stylesheet">
	<link href="../res/Metro-UI-CSS-master/build/css/metro-icons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../res/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../res/font-awesome/css/font-awesome.css">
	<title>IF-ADMIN V2</title>
	<script type="text/javascript" src="../res/angular.min.js"></script>
	<script type="text/javascript" src="../res/app.js"></script>
	<script src="../res/contextMenu.js"></script>
	<script type="text/javascript" src="../res/jquery.js"></script>
	<script type="text/javascript" src="../res/bootstrap/js/bootstrap.js"></script>
	<script src="../res/Metro-UI-CSS-master/build/js/metro.js"></script>
     
</head>

<body class="loaded" ng-controller="DetailStudentCtrl">

<?php include 'options.html'; ?>



	<div class="conteneur col-lg-8 col-sm-12 col-xs-12 col-lg-offset-2 fiche-etudiant">
    
	    <div class="col-lg-12 col-sm-12 col-xs-12 " style="background:black">
	      <img src="../img/ifcad.gif" style="margin:none;">	  
	    </div>
	    <div class="row division">
	    <div class="col-lg-4 col-sm-4 col-xs-4 info"> Année Academique: {{indiv[20].annee}} </div>
	    <div class="col-lg-4 col-sm-4 col-xs-4 info">Filière: {{indiv[18].filiere}} </div>
	    <div class="col-lg-4 col-sm-4 col-xs-4 info">Matricule: {{indiv[0].matricule}}</div>
	     </div>             
	    <div class="col-lg-12 col-sm-12 col-xs-12 Tite-partie">Informaions Personnelles</div><br><br>
	      
	    <div class="col-lg-12 col-sm-12 col-xs-12 info">
	    <div class="col-lg-3 col-sm-3 col-xs-3" style="float:left;">
	    <img src="../img/default.png" style="width:100%;height:auto;"> 
	           
	    </div>

	    <div class="col-lg-9 col-sm-9 col-xs-9" style="float:right;">

	        <div class="col-lg-6 col-sm-6 col-xs-6" style="float:left;">
	        Civilité:  {{indiv[3].civilite}}<br><br>
	        Nom:  {{indiv[1].nom | uppercase}} <br><br> Né (e) le: {{indiv[4].daten}} <br><br> Pays de naissance:  {{indiv[6].paysn}} 
	        <br><br> Tél:  {{indiv[8].tel}}

	        </div>

	        <div class="col-lg-6 col-sm-6 col-xs-6" style="float:right;">
	        <br><br>Prénom:  {{indiv[2].prenom}}<br><br>à:  {{indiv[5].lieun}} <br><br> Nationalité:  {{indiv[7].nation | lowercase}}
	        <br><br>Email:  {{indiv[9].email}}
	        </div>

	        <div class="col-lg-12 col-sm-12 col-xs-12" ><br>
	          Adrèsse: {{indiv[10].adresse}}
	        </div>

	    </div>

	    </div>

	     <br><br><div class="col-lg-12 col-sm-12 col-xs-12 Tite-partie">Profil Academique</div><br><br>
	      
	     <div class="col-lg-12 col-sm-12 col-xs-12 info">
	    <div class="col-lg-6 col-sm-6 col-xs-6" style="float:left;">
	    Dernier diplôme :  {{ indiv[11].diplome }}<br><br>Pays d'obtention:  {{indiv[15].paysd}}
	    </div>

	    <div class="col-lg-6 col-sm-6 col-xs-6" style="float:right;">
	      &Eacute;tablissement:  {{indiv[14].ecoled}} <br><br>Mention:  {{indiv[12].mention}}<br><br>Année:  {{indiv[13].dated}}
	    </div>

	    </div>
	    <br><br><div class="col-lg-12 col-sm-12 col-xs-12 Tite-partie">Informations complementaires</div><br><br>
	      
	    <div class="col-lg-12 col-sm-12 col-xs-12 info">
	    <div class="col-lg-6 col-sm-6 col-xs-6" style="float:left;">
	      Handicape:  {{indiv[17].handicape}}       
	    </div>

	    <div class="col-lg-6 col-sm-6 col-xs-6" style="float:right;">
	       Divertissements:  {{indiv[16].diver}}
	    </div>


	      </div>

	      <div class="col-lg-12 col-sm-12 col-xs-12 " style="background:black">

	      <img src="../img/back.jpeg" style="margin:5px; width:90px;height:90px;float:right;">

	  
	  
	    </div>
	    </div>


	



  <input type="hidden" id="mentt">


</body>
</html>