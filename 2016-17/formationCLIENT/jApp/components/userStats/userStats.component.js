(function (module) {
    module.component('userStats',
        {
            restrict: 'E',
            templateUrl: "jApp/components/userStats/userStats.template.html",
            controller: ['authService',
                function (authService)
                {
                    var that = this;
                    that.user = authService.user;
                }
            ],
            controllerAs: 'userStatsCtrl'
        }
    );
})(app);