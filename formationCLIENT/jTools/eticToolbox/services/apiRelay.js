// self-invoked function
(function (module) {
    var apiRelayFunc = function ($q, $http, $log) {

        'use strict';

        var generateUrl = function (endpoint, methodName, isConventionalRouting) {
            var prefix = "http://localhost:8000/",
                suffix = "";

            // If conventional routing is used, we prefix the url with '/api/'
            if (isConventionalRouting)
                prefix = "http://localhost:8000/api/";


            if ((methodName != undefined)
                &&
                (methodName != null)
            )
                suffix = ("/" + methodName);

            return prefix + endpoint + suffix;
        };

        //-----------
        // Http post
        // JSON is used as data format
        var post = function (endpoint, data, methodName, isConventionalRouting) {
            var deferred = $q.defer();
            $http({
                url:  generateUrl(endpoint, methodName, isConventionalRouting),
                method: "POST",
                data: data,
                headers:
                    {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer NDEzZDA5MGQzZjMyZWFlZmI4NDZkZmQ3YWM4ZjE2NjAzOTEyNmUyMzY4NGJlMDdhZjg3Y2Y0ZWU4ZTU4NTU4OQ'
                    }
            }
            )
                .success(function (data) { deferred.resolve(data); })
                .error(function (e) {
                    $log.error("HTTP POST ERROR");
                    $log.error(e);
                    deferred.reject({ message: "apiHttpPost.FetchHttpData() $http.post() ERROR", inner: e });
                }
            );

            return deferred.promise;
        };


        //-----------
        // Http get
        var httpGet = function (endpoint, params, isConventionalRouting) {
            var deferred = $q.defer();
            $http({
                url: generateUrl(endpoint, methodName, isConventionalRouting),
                params: params,
                method: "GET",
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer NDEzZDA5MGQzZjMyZWFlZmI4NDZkZmQ3YWM4ZjE2NjAzOTEyNmUyMzY4NGJlMDdhZjg3Y2Y0ZWU4ZTU4NTU4OQ'
                }
            }
            )
                .success(function (data) { deferred.resolve(data); })
                .error(function (e) {
                    $log.error("HTTP GET ERROR");
                    $log.error(e);
                    deferred.reject({ message: "apiHttpPost.FetchHttpData() $http.post() ERROR", inner: e });
                }
            );

            return deferred.promise;
        };



        return {
            post: post,
            get: httpGet,
            generateUrl: generateUrl
        };


    };

    var test = module.factory('apiRelay', ["$q", "$http", "$log", apiRelayFunc]);

})(eticToolboxApp);

