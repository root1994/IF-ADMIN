  <!DOCTYPE html>
<html ng-app="IF-ADMIN">
<head>
	<meta name="viewport">
	<link href="./res/Metro-UI-CSS-master/build/css/metro.css" rel="stylesheet">
	<link href="./res/Metro-UI-CSS-master/build/css/metro-icons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./res/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./res/font-awesome/css/font-awesome.css">
	<title>IF-ADMIN V2</title>
	<script type="text/javascript" src="./res/angular.min.js"></script>
	<script type="text/javascript" src="./res/app.js"></script>
	<script src="./res/contextMenu.js"></script>
</head>
<body ng-controller="ConneCtrl">
<?php   
include './view/modal.html';
?>
 <div>
    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <a href="https://ifcad.net"><button type="button" class="close" >&times;</button></a>
	          <h4 class="modal-title"><span class="mif-enter"></span> IF-ADMIN <em> connection</em></h4>
	        </div>
	        <div class="modal-body">

            <div class="row bt1" >
            <center>
                    <form action='./securite.php' method='POST' ng-submit="connect(email,pass)">
              <input type="text" name="email" placeholder="E-mail" ng-model="email">
                
              <br><br>

              <input type="password" name="email" placeholder="Mot de passe" ng-model="pass"><br><br>
              <a ng-click="Connection(email,pass)" id="connecte" type="submit"><button ng-class="myclass" >{{text_btn_connect}}</button></a>

              </form>
            </center>
            </div>
        </div>
        <div class="modal-footer">
          <a href="https://ifcad.net"><button type="button" class="close btn btn-default" >Annuler</button></a>
        </div>
      </div>
      
    </div>
  </div>

</body>
<script type="text/javascript" src="./res/jquery.js"></script>
<script type="text/javascript" src="./res/bootstrap/js/bootstrap.js"></script>
<script src="./res/Metro-UI-CSS-master/build/js/metro.js"></script>

</html>