<?php /* Smarty version 3.1.27, created on 2015-11-12 12:36:57
         compiled from "/var/www/html/onlymakebelieve/include/template/dashboard.html" */ ?>
<?php
/*%%SmartyHeaderCode:2559053045644ce39531183_57727441%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9632138c30a88d22128ae904b36ad5c01e507cc' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/dashboard.html',
      1 => 1447349779,
      2 => 'file',
    ),
    '6ad5b1f9cffa3d12ae4cb1fed953f18934aafd10' => 
    array (
      0 => '/var/www/html/onlymakebelieve/include/template/layout.html',
      1 => 1447348585,
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
      1 => 1447349727,
      2 => 'file',
    ),
    '5277ac66dac4bee4d3a08dfd87900c18c25cc495' => 
    array (
      0 => '5277ac66dac4bee4d3a08dfd87900c18c25cc495',
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
  'nocache_hash' => '2559053045644ce39531183_57727441',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5644ce395e2f58_60503422',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5644ce395e2f58_60503422')) {
function content_5644ce395e2f58_60503422 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2559053045644ce39531183_57727441';
?>
<!DOCTYPE html>
<html lang="en" ng-app="ScheduleApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Only Make Believe | <?php
$_smarty_tpl->properties['nocache_hash'] = '2559053045644ce39531183_57727441';
?>
Dashboard</title>

  
  <?php /*  Call merged included template "links.partial.html" */
echo $_smarty_tpl->getInlineSubTemplate("links.partial.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '14153051885644ce3957cfb5_03531776', 'content_5644ce3957c3b1_69044858');
/*  End of included template "links.partial.html" */?>

  

  </head>

  <body ng-controller="RootController">

    <?php
$_smarty_tpl->properties['nocache_hash'] = '2559053045644ce39531183_57727441';
?>


<!-- Top Navbar -->
<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        
        <ul class="nav navbar-nav navbar-left">
            
            <li id="menu-btn">
                <a>
                    <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                </a>
            </li>
            
        </ul>
        
        <ul class="nav navbar-nav navbar-left hidden-xs">
            
            <li>
                <a href="#">
                    Home
                </a>
            </li>
            <li class="active">
                <a href="#">
                    Schedule
                </a>
            </li>
            <li>
                <a href="#">
                    Actors
                </a>
            </li>
            <li>
                <a href="#">
                    Pay
                </a>
            </li>
            
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
            <li> 
                <img src="resources/images/OMB.png" height ="50px" />
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
            </li>
            
            <li class="dropdown">
            	<a class="dropdown-toggle" data-toggle="dropdown">
            		<?php echo $_smarty_tpl->tpl_vars['user']->value;?>

            		<b class="caret"></b>
            	</a>
          		
          		<ul class="dropdown-menu">
                	<li>
                    <div class="navbar-content">
                        <div class="row">
                            
                            <div class="col-md-5">
                                <img src="resources/images/tameem.jpg"
                                    alt="profilepic" class="img-responsive img-thumbnail" />
                                <p class="text-center small">
                                	<a href="#">Change Photo</a>
                                </p>
                            </div>

                            <div class="col-md-7">
                                <span>Tameem Imamdad</span>
                                <p class="text-muted small">
                                    mail@gmail.com</p>
                                
                                <div class="divider"></div>

                                <a href="?action=profile" class="btn btn-outphish btn-sm">View Profile</a>
                            </div>

                        </div>
                    </div>

                    <div class="navbar-footer">
                        <div class="navbar-footer-content">
                            <div class="row">

                                <div class="col-md-6">
                                    <a href="?action=setting" class="btn btn-default btn-sm">Settings</a>
                                </div>

                                <div class="col-md-6">
                                    <a href="logoff.php" class="btn btn-danger btn-sm pull-right">Sign Out</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    </li>
                </ul>
            </li> <!-- End Profile li -->
           
        </ul>
    </div>    
</div>

<!-- Page content -->
<div id="wrapper">
    
    <div id="sidebar">
	        
        <div class="navbar navbar-default navbar-inverse">
            
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="hidden-xs">Home</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#" data-toggle="collapse" data-target="#scheduleCollapse" aria-expanded="false">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <span class="hidden-xs">Schedule</span>
                    </a>
                    
                    <ul id="scheduleCollapse" class="collapse nav navbar-nav">
                        <li>
                            <a>Event</a>
                        </li>
                        <li>
                            <a>Conflicts</a>
                        </li>
                    </ul>
      
                </li>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="hidden-xs">Actors</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-tags"></span>
                        <span class="hidden-xs">Pay</span>
                    </a>
                </li>
            </ul>
            
        </div>
        
    </div>
    
	<div id="page-wrapper" class="container-fluid" ng-controller="MainController">
		<div class="ng-view"></div>
	</div>
</div>



    <?php
$_smarty_tpl->properties['nocache_hash'] = '2559053045644ce39531183_57727441';
?>

<?php /*  Call merged included template "scripts.partial.html" */
echo $_smarty_tpl->getInlineSubTemplate("scripts.partial.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '15885694595644ce395d7191_75188530', 'content_5644ce395d65c8_22315459');
/*  End of included template "scripts.partial.html" */?>



  </body>
</html>
<?php }
}
?><?php
/*%%SmartyHeaderCode:14153051885644ce3957cfb5_03531776%%*/
if ($_valid && !is_callable('content_5644ce3957c3b1_69044858')) {
function content_5644ce3957c3b1_69044858 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '14153051885644ce3957cfb5_03531776';
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
/*/%%SmartyNocache:14153051885644ce3957cfb5_03531776%%*/
}
}
?><?php
/*%%SmartyHeaderCode:15885694595644ce395d7191_75188530%%*/
if ($_valid && !is_callable('content_5644ce395d65c8_22315459')) {
function content_5644ce395d65c8_22315459 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '15885694595644ce395d7191_75188530';
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
/*/%%SmartyNocache:15885694595644ce395d7191_75188530%%*/
}
}
?>