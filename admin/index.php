<?php

// Using this to run service tests for now
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

// DB not required to check login
require __DIR__ . '/../include/Auth.php';

$auth = new OMBAuth($cfg);

if(!$auth->loggedIn()) {
    header('Location: ../login.php?r=admin');
}

$smarty = new Smarty;
$smarty->setTemplateDir(__DIR__ . '/../include/template');
$smarty->setCompileDir(__DIR__ . '/../include/template_c');

$smarty->assign("user", $_SESSION["user"]);
$smarty->display("dashboard.html");

?>