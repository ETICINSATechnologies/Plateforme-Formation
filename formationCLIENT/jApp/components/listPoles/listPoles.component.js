(function (module) {
    module.component('listPoles',
        {
            restrict: 'E',
            templateUrl: "jApp/components/listPoles/listPoles.template.html",
            controller: [
                function ()
                {
                    this.poles=[
                        {
                              name: 'DSI',
                              description: "Système d'information",
                              icon: "database"
                            },
                            {
                              name: 'Performance',
                              description: "Suivi et amélioration continue",
                              icon: "checkmark"
                            }, 
                            {
                              name: "Unité d'affaire",
                              description: "Vente et réalisation de missions",
                              icon: "line chart"
                            },
                            {
                              name: "Relation Client",
                              description: "Prise de contact et fidélisation",
                              icon: "comments outline"
                            },
                            {
                              name: "Communication",
                              description: "Evénement et cohésion d'équipe",
                              icon: "announcement"
                            },
                            {
                              name: "Trésorerie",
                              description: "Gestion des finances",
                              icon: "bar chart"
                            }];
                      }
            ],
            controllerAs: 'listPolesCtrl'

        }
    );
})(app);
