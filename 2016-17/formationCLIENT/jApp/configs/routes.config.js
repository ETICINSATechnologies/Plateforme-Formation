app.config(["$stateProvider", "$urlRouterProvider",
    function($stateProvider, $urlRouterProvider){
        "use strict";
        //
        // For any unmatched url, redirect to /home
        $urlRouterProvider.otherwise("/home");

        $stateProvider  .state  (   'home',
                                    {   url: "/home",
                                        templateUrl: "jApp/views/home/home.template.html"
                                    }
                                )
                        .state  (   'formations',
                                    {   url: "/formations",
                                        templateUrl: "jApp/views/formations/formations.template.html"
                                    }
                                )
                        .state  (   'profil',
                                    {   url: "/profil",
                                        templateUrl: "jApp/views/profil/profil.template.html"
                                    }
                                );
    }
]);

console.log("routes");