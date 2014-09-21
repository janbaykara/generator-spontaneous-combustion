<?php
require(dirname(__FILE__)."/php/config.php");

$app = new App();
$app->HTMLINJECT = "ng-app";
$app->BODYINJECT = null;
$app->PAGETITLE = "KAKAW";

$app->SCAFFOLD_HEAD();
?>
<main id="wrapper" ng-controller="mainController">
	Hello {{world}}.
</main>
<? $app->SCAFFOLD_FOOT() ?>