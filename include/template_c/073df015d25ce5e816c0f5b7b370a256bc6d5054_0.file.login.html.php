<?php /* Smarty version 3.1.27, created on 2015-11-12 14:43:44
         compiled from "/var/www/html/onlymakebelieve/include/template/login.html" */ ?>
<?php
/*%%SmartyHeaderCode:9933685245644ebf0b0d7a9_28345178%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '073df015d25ce5e816c0f5b7b370a256bc6d5054' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/login.html',
      1 => 1447349811,
      2 => 'file',
    ),
    '6ad5b1f9cffa3d12ae4cb1fed953f18934aafd10' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/layout.html',
      1 => 1447348585,
      2 => 'file',
    ),
    'fd15c80849850436ca39f9c7743070308bf3abcb' => 
    array (
      0 => 'fd15c80849850436ca39f9c7743070308bf3abcb',
      1 => 0,
      2 => 'string',
    ),
    '4d8ccebc8e068525522a4b24a65339c006b7c0bf' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/links.partial.html',
      1 => 1447349727,
      2 => 'file',
    ),
    '621518958de44e2b961098098b82c86d4a8af65c' => 
    array (
      0 => '621518958de44e2b961098098b82c86d4a8af65c',
      1 => 0,
      2 => 'string',
    ),
    'f95a9ab41f92e4bd500b654de397c8d6eb06a6d5' => 
    array (
      0 => 'f95a9ab41f92e4bd500b654de397c8d6eb06a6d5',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '9933685245644ebf0b0d7a9_28345178',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5644ebf0cabf39_69726537',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5644ebf0cabf39_69726537')) {
function content_5644ebf0cabf39_69726537 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9933685245644ebf0b0d7a9_28345178';
?>
<!DOCTYPE html>
<html lang="en" ng-app="ScheduleApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Only Make Believe | <?php
$_smarty_tpl->properties['nocache_hash'] = '9933685245644ebf0b0d7a9_28345178';
?>

Login
</title>

  <?php
$_smarty_tpl->properties['nocache_hash'] = '9933685245644ebf0b0d7a9_28345178';
?>

<link href="resources/css/bootstrap.min.css" rel="stylesheet">
<link href="resources/css/normalize.css" rel="stylesheet">
<link href="resources/css/style.css" rel="stylesheet">


  </head>

  <body ng-controller="RootController">

    <?php
$_smarty_tpl->properties['nocache_hash'] = '9933685245644ebf0b0d7a9_28345178';
?>


<div class="container">
    <div class="col-md-12">
    	<h1 class="mainhead text-center">
    		Only Make Believe Scheduler 
    		<i class="fa fa-clock-o iconcolor fa-lg"></i>
    	</h1>
    </div>
</div>

<!-- Begin page content -->

<div class="container content">

  	<div id="login-overlay" class="modal-dialog">

		<div class="modal-content">

		  	<div class="modal-header">
		      	<h2 class="modal-title text-center" id="myModalLabel">Login</h2>
		  	</div>

	  	<div class="modal-body">
	      	<div class="row">
	          	<div class="col-xs-12">
	              	<div class="well">

	                  	<form id="loginForm" method="POST" action="login.php">

	                      	<div class="form-group">

	                          	<label for="username" class="control-label">Username</label>

	                          	<input type="text" class="form-control" id="username" name="username" value="" title="Please enter you username" placeholder="username or email" required>

	                          	<span class="help-block"></span>

	                      	</div>

	                      	<div class="form-group">

	                          	<label for="password" class="control-label">Password</label>

	                          	<input type="password" class="form-control" id="password" name="password" value="" title="Please enter your password" required>

	                          	<span class="help-block"></span>

	                      	</div>

	                      	<div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>

	                      	<div class="checkbox">

	                          	<label>

	                              	<input type="checkbox" name="remember" id="remember"> Remember login

	                          	</label>

	                          	<p class="help-block">(if this is a private computer)</p>

	                      	</div>

	                      	<button type="submit" class="btn btn-primary btn-block btn-norad">Login</button>
	                      	<button type="submit" class="btn btn-danger btn-block btn-norad"><i class="fa fa-google fa-lg fa-fw"></i>Sign in with Google</button>

	                      	<button type="reset" class="btn btn-default btn-block btn-norad">Register</button>

	                  	</form>

	              	</div>

	          	</div>


	      	</div>

	  	</div>

	</div>

</div>

<div class="clear">&nbsp;</div> 

<div class="footer">
    <p class="text-muted">&#169;2015 Only Make Believe. All Rights Reserved.</p>
</div>



    
      <?php echo '<script'; ?>
 src="resources/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    

  </body>
</html>
<?php }
}
?><?php
/*%%SmartyHeaderCode:17623100775644ebf0c572e8_14206916%%*/
if ($_valid && !is_callable('content_5644ebf0c56d72_94528733')) {
function content_5644ebf0c56d72_94528733 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '17623100775644ebf0c572e8_14206916';
?>
<!-- Bootstrap -->
<link href="resources/css/bootstrap.min.css" rel="stylesheet">

<link href="resources/css/normalize.css" rel="stylesheet">
<link href="resources/css/dashboard.css" rel="stylesheet">
<link href="resources/css/dashboard-theme.css" rel="stylesheet">
<link href="resources/css/style.css" rel="stylesheet">

<!-- Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,900,900italic' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>

  <![endif]--><?php
/*/%%SmartyNocache:17623100775644ebf0c572e8_14206916%%*/
}
}
?>