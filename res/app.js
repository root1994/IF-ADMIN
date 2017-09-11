angular.module("IF-ADMIN", ['ui.bootstrap.contextMenu'])

                
.controller("ConneCtrl",function ($scope,$http) {

  $scope.text_btn_connect = "Se conecter";

  $scope.myclass = "button loading-cube info block-shadow-info text-shadow btn-connect";

  $scope.Connection = function (email,pass) {

      $http({
            method: 'GET',
            url: './API/serveur.php',
            params:{"action":"GetUser",
                    "EMAIL_PROF":email,
                    "PASS_PROF":pass}
            }).then(function successCallback(response) {
           
              if (response.data.status == false) {
                  $scope.myclass = "button block-shadow-danger danger text-shadow btn-connect"; 
                  $scope.text_btn_connect = "Reesayez svp !";
                  $(".error-connection").trigger( "click" );   
              }

              if (response.data.status == true) {
                  $scope.myclass = "button block-shadow-success success text-shadow btn-connect"; 
                  $scope.text_btn_connect = "Connection ...";
                        window.location = './view/accueil.php'
                        }

            }, function errorCallback(response) {
             
            });

    }       
})


.controller("HomeCtrl",function ($scope,$http,sessionFactory,EnseignantFactory,GetprofFactory,MatiereprofFactory) {

          $scope.addetuclass = "button success"
          $scope.addetumsg = "Enregistrer"
          
          function loading(etat){$scope.etat={display:etat}}
          $scope.open = function (cible){
              loading('block')
               window.location = cible }
          loading('block')
          EnseignantFactory.getProfs().success(function(response) {
          $scope.Enseignants = response.result.Users;
          });
        
          GetprofFactory.getProf().success(function(response) {
          $scope.Enseignant = response[0].User;

          MatiereprofFactory.getMatieres($scope.Enseignant.ID_PARCOUR).success(function(response) {
          console.log(response.result.Matieres);
          });


          console.log($scope.Enseignant);
          });
          sessionFactory.getSessions().success(function(response) {
            $scope.sessions = response.result.Sessions;
            angular.forEach($scope.sessions, function(session) {if(session.Session.etat == "active"){ $scope.SessionCourante = session.Session} });
            loading('none') });
          $scope.Addmatiere = function (filiere,designation,enseignant,code,quota) {
              
            console.log(filiere+designation+enseignant+code+quota)
          }

          $scope.menuOptions = [
            ['<span class="mif-widgets fg-green"></span> Explorer', function ($itemScope) {
              //exploreer
              console.log($itemScope.session.Session.annee)
            }],
            null,
            ['<span class="mif-file-download fg-green mif-2x"></span> Listes Etudiant', [
                ['L.E (BSE1)', function () {
                  //bse1
                }],
                ['L.E (BSE2)', function () {
                  //bse2
                }],
                ['L.E (MP)', function () {
                  //mp
                }], 
                ['L.E (MAP)', function () {
                  //map
                }],
            ]],
            null,
            ['<span class="mif-file-download fg-green mif-2x"></span> Billan General', [
                ['B.G (BSE1)', function () {
                  //bse1
                }],
                ['B.G (BSE2)', function () {
                  //bse2
                }],
                ['B.G (MP)', function () {
                  //mp
                }], 
                ['B.G (MAP)', function () {
                  //map
                }],
            ]]
          ]

        $scope.Addetudiant = function (Filiere,Civilite,Nom,Prenom,DateNais,LieuNais,PaysNais,Nation,Adresse,Telephone,Email,LastDip,Etabli,Mension,PaysObten,AnneeObten,Handicape,Divertis,Annee,SessionI){
            $scope.addetuclass = "button info loading-cube"
            $scope.addetumsg = "En cours ..."

            $http({
            method: 'GET',
            url: '../API/serveur.php',
            params:{'action':'AddEtudiant',
                    'Filiere':Filiere,
                    'Civilite':Civilite,
                    'Nom':Nom,
                    'Prenom':Prenom,
                    'DateNais':DateNais,
                    'LieuNais':LieuNais,
                    'PaysNais':PaysNais,
                    'Nation':Nation,
                    'Adresse':Adresse,
                    'Telephone':Telephone,
                    'Email':Email,
                    'LastDip':LastDip,
                    'Etabli':Etabli,
                    'Mension':Mension,
                    'PaysObten':PaysObten,
                    'AnneeObten':AnneeObten,
                    'Handicape':Handicape,
                    'Divertis':Divertis,
                    'Annee':Annee,
                    'SessionI':SessionI}
            }).then(function successCallback(response) {

               $scope.addetuclass = "button success"
            $scope.addetumsg = "Terminer"

              console.log(response)
           

            }, function errorCallback(response) {
             
            });
          }

                 $scope.Addenevent = function (Civilite,Nom,Prenom,LieuNais,DateNais,Telephone,Email,Adresse,Handicape,Divertis,Annee,SessionI){
            $scope.addprofclass = "button info loading-cube"
            $scope.addprpofmsg = "En cours ..."

            $http({
            method: 'GET',
            url: '../API/serveur.php',
            params:{'action':'AddEnseignant',
                    'Civilite':Civilite,
                    'Nom':Nom,
                    'Prenom':Prenom,
                    'DateNais':DateNais,
                    'LieuNais':LieuNais,
                    'Adresse':Adresse,
                    'Telephone':Telephone,
                    'Email':Email,
                    'Handicape':Handicape,
                    'Divertis':Divertis,
                    'Annee':Annee,
                    'SessionI':SessionI}
            }).then(function successCallback(response) {

               $scope.addetuclass = "button success"
            $scope.addetumsg = "Terminer"

              console.log(response)
           

            }, function errorCallback(response) {
             
            });
          }

})


.controller("NoterCtrl",function ($scope,$http,studentFactory,GetprofFactory,MatiereprofFactory) {
         function loading(etat){
           $scope.etat={display:etat}}
         $scope.open = function (cible){
          loading('block')
           window.location = cible }
          loading('none')
          studentFactory.getStudents().success(function(response) {
          $scope.Students = response.result.Students;
          console.log($scope.Students)
          }); 
          GetprofFactory.getProf().success(function(response) {
          $scope.Enseignant = response[0].User;

          MatiereprofFactory.getMatieres($scope.Enseignant.ID_PARCOUR).success(function(response) {
          $scope.Matieres = response.result.Matieres ;
          });

          console.log($scope.Enseignant);
          });
          $scope.detail_etudiant = function (nom,prenom,id,matricule){
          loading('block')
          $scope.nom_etudiant = nom;
          $scope.prenom_etudiant = prenom;
          $scope.id_etudiant = id;
          $scope.matricule_etudiant = matricule;
          loading('none')
          $(".show_detait_etudiant").trigger( "click" ); }

})

.controller("MatiereCtrl",function ($scope,$http,MatiereFactory) {
         function loading(etat){
           $scope.etat={display:etat}}
         $scope.open = function (cible){
          loading('block')
           window.location = cible }
          loading('none')

          MatiereFactory.getMatieres().success(function(response) {
          console.log(response);
          });
 

})


.controller("StudentCtrl",function ($scope,$http,studentFactory) {
         function loading(etat){
           $scope.etat={display:etat}}
         $scope.open = function (cible){
          loading('block')
           window.location = cible }
          loading('none')
          studentFactory.getStudents().success(function(response) {
          $scope.Students = response.result.Students;
          console.log($scope.Students)
          }); 
          $scope.detail_etudiant = function (nom,prenom,id,matricule){
          loading('block')
          $scope.nom_etudiant = nom;
          $scope.prenom_etudiant = prenom;
          $scope.id_etudiant = id;
          $scope.matricule_etudiant = matricule;
          loading('none')
          $(".show_detait_etudiant").trigger( "click" ); }
})


.controller("EnseignantCtrl",function ($scope,$http,EnseignantFactory) {
         function loading(etat){
           $scope.etat={display:etat}}
         $scope.open = function (cible){
          loading('block')
           window.location = cible }
          loading('none')
          EnseignantFactory.getProfs().success(function(response) {
          $scope.Enseignant = response.result.Users;
          console.log($scope.Enseignant)
          }); 
          $scope.detail_prof = function (user){
          loading('block')
          $scope.user = user;
                    $http({
                method: 'GET',
                url: '../API/serveur.php',
                params:{"action":"Matiere_pros",
                        "ID_PARCOUR":user.ID_PARCOUR}
                }).then(function successCallback(response) {
                  $scope.matieres = response.data.result.Matieres;              
                }, function errorCallback(response) {
                 
                });
          loading('none')
          $(".Detail_prof").trigger( "click" ); }
})


.controller("DetailStudentCtrl",function ($scope,$http) {
         console.log("page ok")
})




.factory('GetprofFactory', function($http){
    return {
        getProf: function() {
            return  $http({
            method: 'GET',
            url: '../API/serveur-connection.php',
            params:{"action":"GetUseronline"}
            })
        }
    };
})

.factory('MatiereprofFactory', function($http){
    return {
        getMatieres: function(id) {
            return  $http({
            method: 'GET',
            url: '../API/serveur.php',
            params:{"action":"Matieres"}
            })
        }
    };
})

.factory('MatiereprofFactory', function($http){
    return {
        getMatieres: function(id) {
            return  $http({
            method: 'GET',
            url: '../API/serveur.php',
            params:{"action":"Matiere_prof",
                    "ID_PARCOUR":id}
            })
        }
    };
})

.factory('MatiereFactory', function($http){
    return {
        getProfs: function() {
            return  $http({
            method: 'GET',
            url: '../API/serveur.php',
            params:{"action":"GetMateres"}
            })
        }
    };
})

.factory('studentFactory', function($http){
    return {
        getStudents: function(id) {
            return  $http({
            method: 'GET',
            url: '../API/serveur.php',
            params:{"action":"GetStudents",
                    "Session_parcour":id}
            })
        }
    };
})

.factory('sessionFactory', function($http){
    return {
        getSessions: function() {
            return  $http({
            method: 'GET',
            url: '../API/serveur.php',
            params:{"action":"GetSessions"}
            })
        }
    };
})



