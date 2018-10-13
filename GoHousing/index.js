// document.write("<script src=\"nodeModule/angular.js\"></script>");
// {
//     function hide(app) {
//         var app = angular.module("showhideApp", []);
//         app.controller('showhidectrl', function ($scope) {
//             $scope.showval = true;
//             $scope.hideval = false;
//             $scope.isShowHide = function (param) {
//                 if (param == "show") {
//                     $scope.showval = true;
//                     $scope.hideval = false;
//                 }
//                 else if (param == "hide") {
//                     $scope.showval = false;
//                     $scope.hideval = true;
//                 }
//                 else {
//                     $scope.showval = true;
//                     $scope.hideval = true;
//                 }
//             }
//         });
//
//     }
// }


var app = angular.module("showhideApp", [])
.controller("showhidectrl", function ($scope) {
    $scope.showval = false;
    $scope.hideval = false;
    $scope.isShowHide = function (param) {
        if (param == "show") {
            $scope.showval = false;
            $scope.hideval = false;
        }
        else if (param == "hide") {
            $scope.showval = true;
            $scope.hideval = true;
            $scope.showval1 = false;
        }
    }
    $scope.showval1 = false;
    $scope.isShowHide1 = function (param) {
        if (param == "show") {
            $scope.showval1 = false;
            $scope.hideval = false;
        }
        else if (param == "hide") {
            $scope.showval1 = true;
            $scope.hideval = true;
            $scope.showval = false;
        }
    }
});