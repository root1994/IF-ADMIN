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

<body class="loaded" ng-controller="EnseignantCtrl">
<?php include 'menu-enseignant.php'; ?>
<?php include 'loading.html'; ?>
<?php include 'modal.html'; ?>
               
<div class="col-lg-8 col-sm-12 col-xs-12 col-lg-offset-2">
	<div class="list-group">
	  <a  class="list-group-item active titre">Liste Enseignant
	  <br>
	  <input type="text" name="" class="form-control" placeholder="Rechercher un Enseignant" ng-model="search">
	  </a>
	  <a ng-click="detail_prof(prof.User)" class="list-group-item Student-item" ng-repeat="prof in Enseignant | filter:{User : {nom:search}}">
	  	<div class="col-lg-12 col-sm-12 col-xs-12" >
	  		<div class="col-lg-2 col-sm-2 col-xs-2 Student-matricule">
	  			<img src="../img/default.png" class="etrait-img"><br>
	  			
	  			<span> </span>
	  		</div>
	  		<div class="col-lg-8 col-sm-8 col-xs-8">
	  			<label>Nom & Prenom : {{prof.User.prenom+" "+prof.User.nom}}</label><br><br>
	  			<label>Numero : {{prof.User.tel}}</label><br><br>
	  			<label>Email : {{prof.User.email}}</label>

	  			

	  		</div>
	  		<label id="badge-ribbonX2" ><br>{{prof.User.POSTE_PROF}}</label>
	  	</div>

	  </a>
	</div>
</div>


</body>
</html>