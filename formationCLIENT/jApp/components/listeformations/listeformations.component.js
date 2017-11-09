(function (module) {
    module.component('listeformations',
        {
            restrict: 'E',
            templateUrl: "jApp/components/listeformations/listeformations.template.html",
            controller: [
                function ()
                {
                    this.formations=[
                        {
                              name: 'DSI',
                              description: "Système d'information"
                            },
                            {
                              name: 'Performance',
                              description: "Suivi et amélioration continue"

                            },
                            {
                              name: "Unité d'affaire",
                              description: "Vente et réalisation de missions"

                            },
                            {
                              name: "Relation Client",
                              description: "Prise de contact et fidélisation"

                            },
                            {
                              name: "Communication",
                              description: "Evénement et cohésion d'équipe"

                            },
                            {
                              name: "Trésorerie",
                              description: "Gestion des finances"
                            }];
                      }
            ],
            controllerAs: 'listeformationsCtrl'
        }
    );
})(app);
