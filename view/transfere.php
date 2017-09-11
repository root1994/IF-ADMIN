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
	<link rel="stylesheet" type="text/css" href="../js/css/bootstrap-toggle.css">
	<title>IF-ADMIN V2</title>
	<script type="text/javascript" src="../res/angular.min.js"></script>
	<script type="text/javascript" src="../res/app.js"></script>
	<script src="../res/contextMenu.js"></script>
	<script type="text/javascript" src="../res/jquery.js"></script>
	<script type="text/javascript" src="../res/bootstrap/js/bootstrap.js"></script>
	<script src="../res/Metro-UI-CSS-master/build/js/metro.js"></script>
	<script src="../js/js/bootstrap-toggle.js"></script>
     
</head>

<body class="loaded" ng-controller="StudentCtrl">
<?php include 'menu-etudiant.php'; ?>
<?php include 'loading.html'; ?>
<div class="row menu-etudiant"> 

<div class="widget widget_darkblue col-lg-2 col-sm-2 col-xs-2 bt" style="margin-left: 6%" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Liste des &Eacute;tudiants </span>
                        </div>
                    </div>
                </div>
                

                    <div class="widget widget_darkgreen col-lg-2 col-sm-2 col-xs-2 bt" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Resultat BSE 1 </span>
                        </div>
                    </div>
                </div>


                <div class="widget widget_purple col-lg-2 col-sm-2 col-xs-2 bt" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Resultat BSE2 </span>
                        </div>
                    </div>
                </div>

                <div class="widget widget_darkyellow col-lg-2 col-sm-2 col-xs-2 bt" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Resultat MP </span>
                        </div>
                    </div>
                </div>
                <div class="widget widget_darkgrey col-lg-2 col-sm-2 col-xs-2 bt" data-toggle="modal" data-target="#myModal">
                    <div class="widget_content">
                        <div class="main" style="background-image:url(&#39;images/logo.png&#39;);">
                            <span>Resultat MAP </span>
                        </div>
                    </div>
                </div></div>
               
	<div class="bg-white col-lg-8 col-sm-12 col-xs-12 col-lg-offset-2" id="cell-content">
                    <h1 class="text-light">Transfert des Etudiants <span class="mif-school mif-4x place-right"></span></h1>
                    <hr class="thin bg-grayLighter">                    
                    <button class="button warning"><span class="mif-paper-plane"></span> Tranfert</button>                    
                    <hr class="thin bg-grayLighter">
                    <div  class="dataTables_wrapper no-footer">						
						<div>
							<input type="text" name="" class="form-control" placeholder="Rechercher un etudiant" ng-model="search" >
						</div>
						<table class="dataTable border bordered no-footer" >
                        <thead>
                        <tr role="row">
							<td style="width: 20px" class="sorting_asc"></td>
							<td class="sortable-column sort-asc sorting" style="width: 10px" >Matricule</td>
							<td class="sortable-column sorting">Noms & Prénoms</td>							
							<td style="width: 20px" class="sorting" tabindex="0">Transférer</td>
						</tr>
                        </thead>
                        <tbody>                                        
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                <label class="input-control checkbox small-check no-margin">
                                    <input type="checkbox">
                                    <span class="check"></span>
                                </label>
                            </td>
                            <td>1AM173</td>
                            <td>CECILIA WANGUE Theresa</td>                            
                            <td>
                                <label class="switch-original">
                                    <input checked="checked" type="checkbox">
                                    <span class="check"></span>
                                </label>
                            </td>
                        </tr><tr role="row" class="even">
                            <td class="sorting_1">
                                <label class="input-control checkbox small-check no-margin">
                                    <input type="checkbox">
                                    <span class="check"></span>
                                </label>
                            </td>
                            <td>2AM173</td>
                            <td>DEUGOUE KEMAYOU Dieudonnée Fredy</td>                            
                            <td>
                                <label class="switch-original">
                                    <input type="checkbox">
                                    <span class="check"></span>
                                </label>
                            </td>
                        </tr></tbody>
                    </table>						
                </div>
           
</div>


</body>
</html>