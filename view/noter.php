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

<body class="loaded" ng-controller="NoterCtrl">
<?php include 'menu-noter.php'; ?>
<?php include 'loading.html'; ?>
<?php include 'modal.html'; ?>
<div class="row menu-etudiant"> 

					<div class="col-lg-1 col-sm-1 col-xs-1 col-lg-offset-1 col-sm-offset-1 col-xs-offset-1">
                    
                	</div>

                <div class="widget widget_purple col-lg-1 col-sm-1 col-xs-1 bt" ng-repeat="matiere in Matieres">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>{{matiere.Matiere.nom}} </span>
                        </div>
                    </div>
                </div>
                </div>
               
<div class="col-lg-8 col-sm-12 col-xs-12 col-lg-offset-2">
	<div class="list-group">
	  <a  class="list-group-item active titre">Liste &Eacute;tudiants
	  <br>
	  <input type="text" name="" class="form-control" placeholder="Rechercher un etudiant" ng-model="search">
	  </a>


	  <a class="list-group-item Student-item" ng-repeat="student in Students | filter:{Student : {nom:search,cycle:filiere}}" >
	  	<div class="col-lg-12 col-sm-12 col-xs-12" >
	  		<div class="col-lg-2 col-sm-2 col-xs-2 Student-matricule">
	  			<img src="../img/default.png" class="etrait-img"><br>
	  			
	  			<span >{{student.Student.matricule}}</span>
	  		</div>
	  		<div class="col-lg-8 col-sm-8 col-xs-8">
	  			<br><br>
	  			<label>Nom & Prenom : {{student.Student.nom+" "+student.Student.prenom}}</label><br><br>

	  			

	  		</div>
	  		<br><br>
	  		<input type="text" name="" ng-model="note" style="width: 50px;height: 30px"> <b style="font-size: 16px">/40</b>
	  		<button class="button warning" style="height: 30px;float: right;width: 55px;font-size: 12px">Valider</button>
	  	</div>

	  </a>
	</div>
</div>


</body>
</html>