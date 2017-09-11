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
		<link rel="stylesheet" type="text/css" href="../res/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../res/font-awesome/css/font-awesome.css">
		<link href="../res/Metro-UI-CSS-master/build/css/metro-responsive.css" rel="stylesheet">		
		<title>IF-ADMIN V2</title>
		<script type="text/javascript" src="../res/angular.min.js"></script>
		<script type="text/javascript" src="../res/app.js"></script>
		<script src="../res/contextMenu.js"></script>
		<script type="text/javascript" src="../res/jquery.js"></script>
		<script type="text/javascript" src="../res/bootstrap/js/bootstrap.js"></script>
		<script src="../res/Metro-UI-CSS-master/build/js/metro.js"></script>
		<style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>

    <script>
        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
    </script>
	</head>
	<body class="loaded" ng-controller="HomeCtrl">
		<?php include 'menu.php'; ?>
		<div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%; margin-left: 5px;">
            <div class="row" style="height: 100%">
                <div class="cell size-x200" style="background-color: #71b1d1; height: 100%; font-size: 17px">
                    <ul class="sidebar">
                        <li style="margin-left: 5px;" class="active"><a href="#">
                            <span class="mif-apps icon"></span>
                            <span class="title">TOUT LES ETUDIANTS</span>
                            <span class="counter">0</span>
                        </a></li>
                        <li style="margin-left: 5px;"><a href="#">
                            <span class="mif-chart-dots icon"></span>
                            <span class="title">BSE1</span>
                            <span class="counter">0</span>
                        </a></li>
                        <li style="margin-left: 5px;"><a href="#">
                            <span class="mif-chart-line icon"></span>
                            <span class="title">BSE2</span>
                            <span class="counter">2</span>
                        </a></li>
                        <li style="margin-left: 5px;"><a href="#">
                            <span class="mif-users icon"></span>
                            <span class="title">MAP</span>
                            <span class="counter">0</span>
                        </a></li>
                        <li style="margin-left: 5px;"><a href="#">
                            <span class="mif-chart-pie icon"></span>
                            <span class="title">MP</span>
                            <span class="counter">0</span>
                        </a></li>                    
                    </ul>
                </div>
				<div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Transfert des Etudiants <span class="mif-school mif-4x place-right"></span></h1>
                    <hr class="thin bg-grayLighter">                    
                    <button class="button warning"><span class="mif-paper-plane"></span> Tranfert</button>                    
                    <hr class="thin bg-grayLighter">
                    <div  class="dataTables_wrapper no-footer">						
						<div id="DataTables_Table_0_filter" class="dataTables_filter">
							<label>Search:<input class="" placeholder="" aria-controls="DataTables_Table_0" type="search"></label>
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
        </div>
    </div>
	</body>
</html>