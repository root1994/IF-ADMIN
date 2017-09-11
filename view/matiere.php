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

<body class="loaded" ng-controller="MatiereCtrl">
<?php include 'menu-matiere.php'; ?>
<?php include 'loading.html'; ?>
<div class="row menu-etudiant"> 

<div class="widget widget_darkblue col-lg-2 col-sm-2 col-xs-2 bt" style="margin-left: 16%" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Doc matieres BSE 1 </span>
                        </div>
                    </div>
                </div>


                <div class="widget widget_purple col-lg-2 col-sm-2 col-xs-2 bt" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Doc matieres BSE2 </span>
                        </div>
                    </div>
                </div>

                <div class="widget widget_darkyellow col-lg-2 col-sm-2 col-xs-2 bt" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Doc matieres MP </span>
                        </div>
                    </div>
                </div>
                <div class="widget widget_darkgrey col-lg-2 col-sm-2 col-xs-2 bt" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Doc matieres MAP </span>
                        </div>
                    </div>
                </div></div>
               
<div class="col-lg-8 col-sm-12 col-xs-12 col-lg-offset-2">
	<div class="list-group">
	  <a  class="list-group-item active titre">Liste Matieres
	  <br>
	  <input type="text" name="" class="form-control" placeholder="Rechercher une matieres" ng-model="search">
	  </a>
	  <a ng-click="open('detail-etudiant.php')" class="list-group-item Student-item" ng-repeat="student in Students | filter:{Student : {nom:search,cycle:filiere}}">
	  	<div class="col-lg-12 col-sm-12 col-xs-12" >
	  		<div class="col-lg-2 col-sm-2 col-xs-2 Student-matricule">
	  			<img src="../img/default.png" class="etrait-img"><br>
	  			
	  			<span >{{student.Student.matricule}}</span>
	  		</div>
	  		<div class="col-lg-8 col-sm-8 col-xs-8">
	  			<label>Nom & Prenom : {{student.Student.prenom+" "+student.Student.nom}}</label><br><br>
	  			<label>Numero : {{student.Student.tel}}</label><br><br>
	  			<label>Email : {{student.Student.email}}</label>

	  			

	  		</div>
	  		<label id="badge-ribbon" >{{student.Student.cycle}}</label>
	  	</div>

	  </a>
	</div>
</div>


</body>
</html>