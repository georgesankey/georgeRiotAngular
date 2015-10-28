<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty;
$smarty->setTemplateDir(__DIR__ . '/include/template');
$smarty->setCompileDir(__DIR__ . '/include/template_c');

$smarty->display("login.html");

?>