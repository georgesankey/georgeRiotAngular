<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty;
$smarty->setTemplateDir(__DIR__ . '/include/template');
$smarty->setCompileDir(__DIR__ . '/include/template_c');


if(isset($_POST["email"]) && isset($_POST["password"])) {
	
	require_once __DIR__ . '/include/db/dbconfig.php';
	require __DIR__ . '/include/Auth.php';
	$registerAcc = new OMBAuth($cfg, $dbh);

    $registerAcc->register();

    if($registerAcc->error) {
    	$smarty->assign("error", true);
    	print($registerAcc->error);
    	if($registerAcc->error == 6) {
    		$smarty->assign("errorMessage", "That email already has an account! Please provide another.");
    	} 
		$smarty->display("register.html");
    }
	
	else {
		// Registration successful, redirect
		header('Location: login.php');
	}
      
} else {
	$smarty->assign("error", false);
	$smarty->display("register.html");
}

?>