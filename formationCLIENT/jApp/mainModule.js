/* App Module */
//===============================
//===============================
var app = angular.module('etic-formation-app', ["ui.router", 'eticToolbox']);
//===============================
//===============================

app.controller("pfMainController",
                    ["authService",
                        function (authService) {
                            // 'this' alias to avoid scope mistakes
                            var that = this;

                            that.auth = authService;

                        }
                    ]
                );