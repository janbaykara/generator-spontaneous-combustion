var app = angular.module('Dossier', ['ui.router']);

/* AngularJS calling order
1. app.config()
2. app.run()
3. directive's compile functions (if they are found in the dom)
4. app.controller()
5. directive's link functions (again if found)
*/

app.config(function($stateProvider, $urlRouterProvider) {

  $stateProvider
    .state('index', {
      url: '/',
      templateUrl: 'partials/index.html'
    })

    $urlRouterProvider.otherwise('/');
})

app.run(function ($state) {
   $state.transitionTo('index');
})
