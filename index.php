<?php require("config.php");

$app = new App();
$app->HTMLINJECT = "ng-app='app'";
// $app->BODYINJECT;
// $app->PAGETITLE;

$app->document_head(); ?>

<main id="wrapper" ng-controller="mainController">
	Hello {{world}}.
</main>

<? $app->document_foot() ?>