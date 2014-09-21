'use strict';

/* -----
| See: http://pineconellc.github.io/angular-foundation/
*/

var app = angular.module("app", ['mm.foundation']);

app.controller('mainController', function($scope) {
	$scope.world = "world";
});