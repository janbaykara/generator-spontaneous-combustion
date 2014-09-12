<?php
require(dirname(__FILE__)."/php/config.php");

$app = new App();
$app->HTMLINJECT = "ng-app='lorem-ipsum'";
$app->BODYINJECT = null;
$app->PAGETITLE = "KAKAW";

$app->SCAFFOLD_HEAD();
?>
<main id="wrapper">
Hello world.
</main>
<? $app->SCAFFOLD_FOOT() ?>