<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty;
$smarty->setTemplateDir(__DIR__ . '/include/template');
$smarty->setCompileDir(__DIR__ . '/include/template_c');


if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
	
	require_once __DIR__ . '/include/db/dbconfig.php';
	require __DIR__ . '/include/Auth.php';
	$registerAcc = new OMBAuth($cfg, $dbh);

    //check if the username exists
 	if($registerAcc->__usernameExists($_POST["username"])) {

		$smarty->assign("error", true);
		$smarty->assign("errorMessage", "That username already has an account! Please provide another.");		
		$smarty->display("register.html");

	} else if($registerAcc->__emailExists($_POST["email"])) {
		//check if the email exists
		$smarty->assign("error", true);
		$smarty->assign("errorMessage", "That email already has an account! Please provide another.");		
		$smarty->display("register.html");
	} else {
		//otherwise, this is a valid account, add request to the DB
        $registerAcc->register();
		
		//$smarty->assign("success", true);
		//$smarty->assign("error", false);
		//echo "<script type='text/javascript'>alert('Your account request has been submitted! Please wait for an email notification regarding approval.');</script>";
    	header('Location: login.php');
	}
      
} else {
	$smarty->assign("error", false);
	$smarty->display("register.html");
}

?>