<?php /* Smarty version 3.1.27, created on 2015-11-09 11:52:09
         compiled from "/var/www/html/onlymakebelieve/include/template/login.html" */ ?>
<?php
/*%%SmartyHeaderCode:15759903925640cf39d63952_47418779%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '073df015d25ce5e816c0f5b7b370a256bc6d5054' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/login.html',
      1 => 1446069087,
      2 => 'file',
    ),
    '6ad5b1f9cffa3d12ae4cb1fed953f18934aafd10' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/layout.html',
      1 => 1447084351,
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
      1 => 1446068369,
      2 => 'file',
    ),
    '64ae2c5ee51c0f54968f240bcb08994d595e625a' => 
    array (
      0 => '64ae2c5ee51c0f54968f240bcb08994d595e625a',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '15759903925640cf39d63952_47418779',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5640cf39e0ea29_57933580',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5640cf39e0ea29_57933580')) {
function content_5640cf39e0ea29_57933580 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15759903925640cf39d63952_47418779';
?>
<!DOCTYPE html>
<html lang="en" ng-app="ScheduleApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Only Make Believe | <?php
$_smarty_tpl->properties['nocache_hash'] = '15759903925640cf39d63952_47418779';
?>

Login
</title>

  
  <?php /*  Call merged included template "links.partial.html" */
echo $_smarty_tpl->getInlineSubTemplate("links.partial.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '8449812055640cf39dc0fe0_23267003', 'content_5640cf39dc0872_59340047');
/*  End of included template "links.partial.html" */?>

  

  </head>

  <body>

    <?php
$_smarty_tpl->properties['nocache_hash'] = '15759903925640cf39d63952_47418779';
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

	                  	<form id="loginForm" method="POST" action="index.php">

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
/*%%SmartyHeaderCode:8449812055640cf39dc0fe0_23267003%%*/
if ($_valid && !is_callable('content_5640cf39dc0872_59340047')) {
function content_5640cf39dc0872_59340047 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '8449812055640cf39dc0fe0_23267003';
?>
<!-- Bootstrap -->
<link href="resources/css/bootstrap.min.css" rel="stylesheet">

<link href="resources/css/normalize.css" rel="stylesheet">
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
/*/%%SmartyNocache:8449812055640cf39dc0fe0_23267003%%*/
}
}
?>