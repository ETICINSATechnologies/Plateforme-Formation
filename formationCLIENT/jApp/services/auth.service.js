// self-invoked function
(function (module) {
    module.service("authService", ["apiRelay", function (apiRelay) {
        "use strict";

        var that = this;
        that.user = {
            name: "GALLY",
            firstName: "Justin",
            isAdmin: true
        }

    }]);

})(app);
