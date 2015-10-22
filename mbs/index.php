
<?php
/*
Author: Tameem Imamdad
Email: timamdad@hawk.iit.edu
*/
session_start();

$username = null;

$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



  if(!empty($_POST["username"]) && !empty($_POST["password"])) {

    $username = $_POST["username"];

    $password = $_POST["password"];

    

    if($username == 'tameem' && $password == 'test') {

      //session_start();

      $_SESSION["authenticated"] = 'true';

      $_SESSION["username"] = $username;

      header('Location: dashboard.php');

    }

    else {

      header('Location: dashboard.php');

    }

    

  } else {

    header('Location: login.php');

  }

} else {

?>

<?php 

  $title = 'Login';

  include 'include/header.php'; ?>

  

    <!-- Begin page content -->

    <div class="container content">

      <div class="page-header">

      </div>

               <?php

              if(!isset($_SESSION['authenticated']))

              {

                  // session has NOT been started

                echo   '

    <div id="login-overlay" class="modal-dialog">

      <div class="modal-content">

          <div class="modal-header">

              <h2 class="modal-title text-center" id="myModalLabel">Login</h4>

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

                ';

              }

              else

              {

                  // session has been started


              }

              ?>

    </div>

<div class="clear">&nbsp;</div> 

<?php include 'include/footer.php'; ?>

<?php } ?>