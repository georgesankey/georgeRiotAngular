<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty;
$smarty->setTemplateDir(__DIR__ . '/include/template');
$smarty->setCompileDir(__DIR__ . '/include/template_c');

if(isset($_GET["r"])) {
	$smarty->assign("redir", $_GET["r"]);
}

if(isset($_POST["email"]) && isset($_POST["password"])) {

	require_once __DIR__ . '/include/db/dbconfig.php';
	require __DIR__ . '/include/Auth.php';

	$auth = new OMBAuth($cfg, $dbh);

    //do the initial log-in
 	if($auth->login($_POST["email"], $_POST["password"])) {
		// If Debug is on, have to redirect with JS

		if(isset($_GET["r"])) {
			header('Location: index.php#/'.$_GET["r"]);
		}

		header('Location: index.php');
		die("<script type='text/javascript'>document.location.pathname='/onlymakebelieve/';</script>");
	} else {
		$smarty->assign("error", true);
	    $smarty->display("login.html");
	}

} else {
	$smarty->assign("error", false);
	$smarty->display("login.html");
}

?>
