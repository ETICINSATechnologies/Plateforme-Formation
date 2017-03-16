(function (module) {
    module.component('poster',
        {
            restrict: 'E',
            templateUrl: "jApp/components/poster/poster.template.html",
            controller: ['apiRelay',
                function (apiRelay)
                {
                    var that = this;

                    var data = 
                    {
                        contentProposal: "Ceci est un test de post",
                        answer: "No",
                        questions: 1
                    };

                    that.post = function(){
                        console.log("post fired");
                        apiRelay.post("users", data, "addProposal", true)
                                .then(function(value){
                                    console.log(value);
                                })
                                .catch(function(err){
                                    console.log("ERROR");
                                    console.log(err);
                                });
                    };
                }
            ],
            controllerAs: 'posterCtrl'
        }
    );
})(app);
