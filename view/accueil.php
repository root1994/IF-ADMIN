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

<body class="loaded" ng-controller="HomeCtrl">
<?php include 'menu.php'; ?>
<?php include 'loading.html'; ?>
<?php include 'modal.html'; ?>

        <center>
     <div class="col-lg-10 col-sm-12 col-xs-12 scren">

        <div class="row">
             <a href="https://ifcad.net">
                <div class="widget widgete4x2 col-lg-4 col-sm-4 col-xs-12 widget_blue"  data-theme="red" data-name="userback" >
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/home.png" width="auto" height="80%" />
                            <span>Accueil</span>
                        </div>
                    </div>
                </div></a>

                <div class="widget widgete4x2 col-lg-4 col-sm-4 col-xs-12 widget_orange widget_link" ng-click="open('./etudiants.php')"  data-theme="red" data-name="userback" context-menu="menuOptions" >
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/etudiant.png" width="auto" height="80%" />
                            <span>&Eacute;tudiants</span>
                        </div>
                    </div>
                </div></a>

             <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_yellow" data-backdrop="static" data-theme="red" data-name="royal_preloader"  data-toggle="modal" data-target="#AjouterEtudiant">
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/etudiant_add.png" width="auto" height="80%" />
                            <span>add &Eacute;tudiant</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_darkorange" data-backdrop="static" data-theme="red" data-name="royal_preloader"  data-toggle="modal" data-target="#Transfert" style="">
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/transfere.png" width="auto" height="80%" />
                            <span>Transfere</span>
                        </div>
                    </div>
                </div>
              
                 <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_purple" data-url="metro_gallery.php" data-theme="green" data-name="metro_gallery.js" style="">
                        <div class="widget_content">
                            <div class="main">
                            <img src="../img/cash.png" width="auto" height="80%" />

                                <span>Finance</span>
                            </div>
                        </div>
                </div>


                <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12" data-url="typography.php" data-theme="darkred" data-name="typography" style="background: #B986D6" ng-click="open('./matiere.php')" >
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/matiere.png" width="auto" height="80%" />
                            <span>MATI&Egrave;RES</span>
                        </div>
                    </div>
                </div>

            <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_darkgrey" ng-click="open('./enseignant.php')" style="">
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/prof.png" width="auto" height="80%" />
                            <span>Enseignants</span>
                        </div>
                    </div>
                </div>


            <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_orange" data-backdrop="static" data-theme="red" data-name="royal_preloader"  data-toggle="modal" data-target="#AjouterEnseignant" style="">
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/prof_add.png" width="auto" height="80%" />
                            <span>ADD Enseignant</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

            <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_darkblue" data-toggle="modal" data-target="#Gstsession" >
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/session.png" width="auto" height="80%" />
                            <span>Sessions</span>
                        </div>
                    </div>
            </div>



            <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 "  data-theme="green" data-toggle="modal" data-target="#AjouterMatiere" style="background: #DA296F">
                    <div class="widget_content">
                        <div class="main">
                        <img src="../img/matiere_add.png" width="auto" height="80%" />
                            <span>ADD MATI&Egrave;RES</span>
                        </div>
                    </div>
            </div>


            <div class="widget widgete4x2 col-lg-4 col-sm-4 col-xs-12 widget_darkgreen" ng-click="open('./noter.php')" >
                    <div class="widget_content" context-menu="menuOptionsProf">
                        <div class="main">
                        <img src="../img/noter.png" width="auto" height="80%" />
                            <span>Noter</span>
                        </div>
                    </div>
                </div>
             

             <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12" data-toggle="modal" data-target="#Gstarchive" style="background: #77DF9B">
                    <div class="widget_content" >
                        <div class="main">
                        <img src="../img/archive_logo.png" width="auto" height="78%" style="margin: 3px" />
                            <span>ARCHIVES</span>
                        </div>
                    </div>
               
            </div>
            </div>

            </center>
     

</body>
</html>
