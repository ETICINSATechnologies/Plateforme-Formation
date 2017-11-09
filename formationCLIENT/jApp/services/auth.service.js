// self-invoked function
(function (module) {
    module.service("authService", ["apiRelay", function (apiRelay) {
        "use strict";

        var that = this;
        that.user = {
            name: "GALLY",
            firstName: "Justin",
            image: "anonyme.png",
            email : "justin.gally@insa-lyon.fr",
            groupe : "DSI Groupe",
            isAdmin: true
        }

    }]);

})(app);
