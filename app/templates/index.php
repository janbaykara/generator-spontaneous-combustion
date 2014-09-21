<?php require("config.php");

$app = new App();
$app->HTMLINJECT = "ng-app='app'";
// $app->BODYINJECT;
// $app->PAGETITLE;

$app->document_head(); ?>

<main id="wrapper" ng-controller="mainController">
	<div class="row">
		<h4 class="column small-12">Hello {{world}}.</h4>
		<div class="column small-12">
			<i class="fa fa-code placeholder-hero"></i>
		</div>
	</div>
</main>

<? $app->document_foot() ?>