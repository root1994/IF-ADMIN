<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
  
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">IFCAD</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./index.php">{{SessionCourante.annee+" ("+SessionCourante.nom+")"}}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">

            <div style="width:300px;float:right;height:50px;padding-right:15px;width:auto;">
            

        <div style="float:left;margin-top:15px;"><b>Bonjour &nbsp;&nbsp;  <?php echo $_SESSION['User'][0]['User']['civilite'] ; ?></b>&nbsp; <?php echo $_SESSION['User'][0]['User']['nom'] ; ?></div></div></li>
        

        
        <li class=" dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><div style="float:right;font-size:20px;color:#8FCF3C;font-weight: bold">
            <?php echo $_SESSION['User'][0]['User']['nom'][0].$_SESSION['User'][0]['User']['prenom'][0] ; ?>
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
