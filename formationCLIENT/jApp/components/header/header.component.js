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

$(document).ready(function(){
  $('.right.menu.open').on("click",function(e){
    e.preventDefault();
    $('.ui.vertical.menu').toggle();
  });
    
  $('.ui.dropdown').dropdown();
});