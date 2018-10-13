document.write("<script src=\"nodeModule/angular.js\"></script>");
{
    function hide(app) {
        var app = angular.module("AngularshowhideApp", []);
        app.controller('showhidectrl', function ($scope) {
            $scope.showval = true;
            $scope.hideval = false;
            $scope.isShowHide = function (param) {
                if (param == "show") {
                    $scope.showval = true;
                    $scope.hideval = true;
                }
                else if (param == "hide") {
                    $scope.showval = false;
                    $scope.hideval = false;
                }
                else {
                    $scope.showval = true;
                    $scope.hideval = false;
                }
            }
        });

    }
}
