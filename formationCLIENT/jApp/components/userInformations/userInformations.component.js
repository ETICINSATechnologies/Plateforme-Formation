(function (module) {
    module.component('userInformations',
        {
            restrict: 'E',
            templateUrl: "jApp/components/userInformations/userInformations.template.html",
            controller: ['authService',
                function (authService)
                {
                    var that = this;
                    that.user = authService.user;
                }
            ],
            controllerAs: 'userInformationsCtrl'
        }
    );
})(app);