<?php
require("config.php");

$app = new App();
$app->HTMLINJECT = "ng-app='app'";
// $app->BODYINJECT;
// $app->PAGETITLE;

$app->SCAFFOLD_HEAD();
?>
<main id="wrapper" ng-controller="mainController">
	Hello {{world}}.
</main>
<? $app->SCAFFOLD_FOOT() ?>