(function (module) {
    module.component('header',
        {
            restrict: 'E',
            templateUrl: "jApp/components/header/header.template.html",
            controller: ['authService',
                function (authService)
                {
                    var that = this;
                    that.user = authService.user;
                }
            ],
            controllerAs: 'headerCtrl'
        }
    );
})(app);
