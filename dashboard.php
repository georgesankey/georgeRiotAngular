<?php

require_once('authenticate.php');

?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" href="favicon.ico">



    <title>

<?php

$action = 'services';

$class = '';

$disallowed_paths = array('header', 'footer'); 

  if (empty($_GET['action']))

  {

  $action = 'profile';

  echo  $action;

  }

if (!empty($_GET['action'])) { 

    $tmp_action = basename($_GET['action']); 

    // If it's not a disallowed path, and if the file exists, update $action 

    if (!in_array($tmp_action, $disallowed_paths) && file_exists("dashboard/{$tmp_action}.php"))

  {

        $action = $tmp_action; 

    echo  "Dashboard | $action" ;

    $class = 'active';



  }

  else

  {

  $action = '404';

  echo "Error 404";

  }

  

}

?>

    </title>



    <link href="resources/css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->

    <link href="resources/css/dashboard.css" rel="stylesheet">

    <link href="resources/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">





    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>



  </head>



  <body>



    <nav class="navbar navbar-outphish navbar-fixed-top" role="navigation">

       <div class="container-fluid">

          <div class="navbar-header">
<h1 class="mainhead text-center">Only Make Believe Scheduler <i class="fa fa-clock-o iconcolor fa-lg"></i></h1>

          </div>

          <div class="collapse navbar-collapse">

            <div class="navform">

              <?php

              if(!isset($_SESSION['authenticated']))

              {

                  // session has NOT been started

                echo   " 

                <form class='navbar-form navbar-right' action='index.php' method='post' role='login'>

                <div class='form-group'>

                <input type='text' name='username' class='form-control' placeholder='Username'>

                <input type='password' name='password' class='form-control' placeholder='Password'>

                </div>

                <button type='submit' class='btn btn-default'>

                <span class='glyphicon glyphicon-lock'></span>        </button>

                </form>

                ";

              }

              else

              {

                  // session has been started

                echo '

                                                <ul class="nav navbar-nav navbar-right">

                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account

                                        <b class="caret"></b></a>

                                        <ul class="dropdown-menu">

                                            <li>

                                                <div class="navbar-content">

                                                    <div class="row">

                                                        <div class="col-md-5">

                                                            <img src="resources/images/tameem.jpg"

                                                                alt="profilepic" class="img-responsive img-thumbnail" />

                                                            <p class="text-center small">

                                                                <a href="#">Change Photo</a></p>

                                                        </div>

                                                        <div class="col-md-7">

                                                            <span>Tameem Imamdad</span>

                                                            <p class="text-muted small">

                                                                mail@gmail.com</p>

                                                            <div class="divider">

                                                            </div>

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

                                        </ul>';

              }

              ?>

            </div>

          </div><!--/.nav-collapse -->

        </div>

    </nav>



    <div class="container-fluid">

      <div class="row ">



  <?php include 'include/dashnav.php'; ?>
  

  <?php include("dashboard/$action.php"); ?>



      </div>

    </div>



    <!-- Bootstrap core JavaScript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="resources/js/bootstrap.min.js"></script>

  </body>

</html>

