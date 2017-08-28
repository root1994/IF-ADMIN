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
                   $http({
                      method: 'GET',
                      url: './API/serveur-connection.php',
                      params:{"User":response.data.result.Users[0].User,
                              "action":"Connection"}
                      }).then(function successCallback(response) {
                        window.location = './view/accueil.php'
                      }, function errorCallback(response) {
                       
                      }); 
           
                        }

            }, function errorCallback(response) {
             
            });

    }
         
})


.controller("HomeCtrl",function ($scope,$http) {

  
})


.factory("UserFactory",function ($http) {


        
})




