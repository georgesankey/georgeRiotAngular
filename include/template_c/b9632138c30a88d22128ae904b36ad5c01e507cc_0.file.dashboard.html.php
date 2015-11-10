<?php /* Smarty version 3.1.27, created on 2015-11-09 12:14:16
         compiled from "/var/www/html/onlymakebelieve/include/template/dashboard.html" */ ?>
<?php
/*%%SmartyHeaderCode:119036205640d468ae9955_04146916%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9632138c30a88d22128ae904b36ad5c01e507cc' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/dashboard.html',
      1 => 1447089246,
      2 => 'file',
    ),
    '6ad5b1f9cffa3d12ae4cb1fed953f18934aafd10' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/layout.html',
      1 => 1447084351,
      2 => 'file',
    ),
    'c646081bb8df779739172f3b17f3100d7fbec6ee' => 
    array (
      0 => 'c646081bb8df779739172f3b17f3100d7fbec6ee',
      1 => 0,
      2 => 'string',
    ),
    '4d8ccebc8e068525522a4b24a65339c006b7c0bf' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/links.partial.html',
      1 => 1446068369,
      2 => 'file',
    ),
    '2f5f10a9bfc879ab091235579cc6c5934dbeda78' => 
    array (
      0 => '2f5f10a9bfc879ab091235579cc6c5934dbeda78',
      1 => 0,
      2 => 'string',
    ),
    '553a43a05ca2a8819011a9e4237fa521f53f3767' => 
    array (
      0 => '553a43a05ca2a8819011a9e4237fa521f53f3767',
      1 => 0,
      2 => 'string',
    ),
    'ce328caaafb54e8ee3293ac70336ba30b6e22f93' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/scripts.partial.html',
      1 => 1447088640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119036205640d468ae9955_04146916',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5640d468b40c32_43865741',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5640d468b40c32_43865741')) {
function content_5640d468b40c32_43865741 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '119036205640d468ae9955_04146916';
?>
<!DOCTYPE html>
<html lang="en" ng-app="ScheduleApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Only Make Believe | <?php
$_smarty_tpl->properties['nocache_hash'] = '119036205640d468ae9955_04146916';
?>
Dashboard</title>

  
  <?php /*  Call merged included template "links.partial.html" */
echo $_smarty_tpl->getInlineSubTemplate("links.partial.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '4101787495640d468b16376_14162141', 'content_5640d468b15c94_20962926');
/*  End of included template "links.partial.html" */?>

  

  </head>

  <body>

    <?php
$_smarty_tpl->properties['nocache_hash'] = '119036205640d468ae9955_04146916';
?>


<div class="container-fluid" ng-controller="MainController">
	<div class="ng-view"></div>
</div>



    <?php
$_smarty_tpl->properties['nocache_hash'] = '119036205640d468ae9955_04146916';
?>

<?php /*  Call merged included template "scripts.partial.html" */
echo $_smarty_tpl->getInlineSubTemplate("scripts.partial.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '1222439415640d468b3b2f0_62299650', 'content_5640d468b3ad22_83265187');
/*  End of included template "scripts.partial.html" */?>



  </body>
</html>
<?php }
}
?><?php
/*%%SmartyHeaderCode:4101787495640d468b16376_14162141%%*/
if ($_valid && !is_callable('content_5640d468b15c94_20962926')) {
function content_5640d468b15c94_20962926 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '4101787495640d468b16376_14162141';
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
/*/%%SmartyNocache:4101787495640d468b16376_14162141%%*/
}
}
?><?php
/*%%SmartyHeaderCode:1222439415640d468b3b2f0_62299650%%*/
if ($_valid && !is_callable('content_5640d468b3ad22_83265187')) {
function content_5640d468b3ad22_83265187 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '1222439415640d468b3b2f0_62299650';
?>
	<!-- Bootstrap core JavaScript
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<?php echo '<script'; ?>
 src="resources/js/bootstrap.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="resources/js/lib/angular.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="resources/js/lib/angular-route.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="resources/js/main.js"><?php echo '</script'; ?>
><?php
/*/%%SmartyNocache:1222439415640d468b3b2f0_62299650%%*/
}
}
?>