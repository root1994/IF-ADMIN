<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">IFCAD</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand titre-menu-etudiant" href="./accueil.php">IFCAD</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li class="connexion">
                    <select class="form-control" ng-model="filiere">
                        <option value="">Filtre la liste des etudiants par filiere </option>
                        <option value="BSE1">BSE1</option>
                        <option value="BSE2">BSE2</option>
                        <option value="MAP">MAP</option>
                        <option value="MP">MP</option>
                    </select>
                  </li>
                   
                </ul>
            </div>
        </div>
    </nav>



    <br><br><br>
