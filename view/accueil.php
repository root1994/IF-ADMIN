<?php
session_name('IFCAD');
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
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
  
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">IFCAD</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./index.php">session</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="connexion">

            <div style="width:300px;float:right;height:50px;padding-right:15px;width:auto;">
            

        <div style="float:left;margin-top:15px;"><b>Bonjour &nbsp;&nbsp;  teste</b>teste</div></div></li>
        

        
        <li class="connexion dropdown" style="margin-top: -2px">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><div style="height:40px;width:60px;border-radius:30px;margin-bottom:5px;margin-right:5px;margin-left:5px;background:#FFF;float:right;font-weight:bold;font-size:22px;text-align:center;padding-top:5px;color:#8FCF3C">
            teste
        </div></a>
                <ul class="dropdown-menu" style="padding:15px;border-radius:12px;;margin-top:5px">
                   <li> <center><img src="../img/default.png" width='100px'></center><br></li>
                 <!--/.inscription -->
                 <li> <form action='securite.php' method='GET'>
                    <input type='hidden' value='deconnection' name='action'>
                    <input type="submit" value="Deconnexion" class="btn btn-primary"/>
                  </form>
                  <button class="btn btn-info" title="Modifier vos Parametre" data-toggle="modal" data-target="#Parametre"><span class="glyphicon glyphicon-cog"></span></button><li>

                 <!--/.fin -->
                </ul>
              </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



    <br><br><br>


        <center>
     <div class="col-lg-10 col-sm-12 col-xs-12 scren">

        <div class="row">
             <a href="http://ifcad.net">
                <div class="widget widgete4x2 col-lg-4 col-sm-4 col-xs-12 widget_orange"  data-theme="red" data-name="userback" style="background-color:#BCB9B8;" >
                    <div class="widget_content">
                        <div class="main" style="background-color:#BCB9B8;background-image:url(&#39;images/widget_userback.png&#39;);">
                        <img src="../img/home.png" width="auto" height="80%" />
                            <span>&Eacute;tudiants</span>
                        </div>
                    </div>
                </div></a>


                <a href="./templates/liste.php?annee={{session_ouverte.annee}}&session={{session_ouverte.id}}">
                <div class="widget widgete4x2 col-lg-4 col-sm-4 col-xs-12 widget_red widget_link" style="background-color:#BCB9B8;"  data-theme="red" data-name="userback" >
                    <div class="widget_content">
                        <div class="main" style="background-color:#BCB9B8;background-image:url(&#39;images/widget_userback.png&#39;);">
                        <img src="../img/etudiant.png" width="auto" height="80%" />
                            <span>&Eacute;tudiants</span>
                        </div>
                    </div>
                </div></a>

             <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_orange" data-backdrop="static" data-theme="red" data-name="royal_preloader"  data-toggle="modal" data-target="#AjouterEtudiant" style="background-color:#BCB9B8;">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_royal_preloader.png&#39;);">
                        <img src="../img/etudiant_add.png" width="auto" height="80%" />
                            <span>add &Eacute;tudiant</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
			 <a href="./templates/liste_prof.php?annee={{session_ouverte.annee}}">
                <div class="widget widgete4x2 col-lg-4 col-sm-4 col-xs-12 widget_green" style="background-color:#BCB9B8;">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_admin7.png&#39;);">
                        <img src="../img/prof.png" width="auto" height="80%" />
                            <span>Enseignants</span>
                        </div>
                    </div>
                </div></a>


             <a href="./templates/matiereg.php?annee={{session_ouverte.annee}}">
                <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12" data-url="typography.php" data-theme="darkred" data-name="typography" style="background: #B986D6">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_editable.png&#39;);">
                        <img src="../img/matiere.png" width="auto" height="80%" />
                            <span>MATI&Egrave;RES</span>
                        </div>
                    </div>
                </div></a>


             <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_green" data-url="metro_gallery.php" data-theme="green" data-name="metro_gallery.js" style="background-color:#BCB9B8;">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_metro_gallery.png&#39;);">
                        <img src="../img/msg.png" width="auto" height="80%" />

                            <span>MSG Enseignants</span>
                        </div>
                    </div>
            </div>



            <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 widget_orange" data-backdrop="static" data-theme="red" data-name="royal_preloader"  data-toggle="modal" data-target="#AjouterEnseignants" style="background-color:#BCB9B8;">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_royal_preloader.png&#39;);">
                        <img src="../img/prof_add.png" width="auto" height="80%" />
                            <span>ADD Enseignant</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

            <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12" data-toggle="modal" data-target="#Gstsession" style="background: #7784DF">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_metro_gallery.png&#39;);">
                        <img src="../img/session.png" width="auto" height="80%" />
                            <span>Sessions</span>
                        </div>
                    </div>
            </div>



            <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12 "  data-theme="green" data-toggle="modal" data-target="#AjouterMatiere" style="background: #DA296F">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_metro_gallery.png&#39;);">
                        <img src="../img/matiere_add.png" width="auto" height="80%" />
                            <span>ADD MATI&Egrave;RES</span>
                        </div>
                    </div>
            </div>



            <a href="./templates/matiere.php?session={{session_ouverte.id}}&annee={{session_ouverte.annee}}&matiere=0&id=<?php echo $_SESSION['id']; ?>" >
            <div class="widget widgete4x2 col-lg-4 col-sm-4 col-xs-12 widget_darkgreen"  style="background: #DA296F" >
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/widget_admin7.png&#39;);">
                        <img src="../img/noter.png" width="auto" height="80%" />
                            <span>Noter</span>
                        </div>
                    </div>
                </div></a>

             

             <div class="widget widgete2x2 col-lg-2 col-sm-2 col-xs-12" data-toggle="modal" data-target="#SModal" style="background: #77DF9B">
                    <div class="widget_content" >
                        <div class="main" style="background-image:url(&#39;images/widget_metro_gallery.png&#39;);">
                        <img src="../img/archive_logo.png" width="auto" height="78%" style="margin: 3px" />
                            <span>ARCHIVES</span>
                        </div>
                    </div>
               
            </div>
            </div>

            </center>
     

</body>
</html>
