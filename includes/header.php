<!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <!-- Required meta tags always come first -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="style/bootstrap.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="style/style.css" media="screen, projectio" />
      <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/dist/fonts/roboto"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>


<?php
include './db/config.php';
session_start();
?>

<header class="jumbotron">
      <div class="container">
          <div class="row row-header">
              <div class="col-12 col-sm-8">
                  <h1>Ristorante con Fusion</h1>

                  <?php if(isset($_SESSION['name'])) { ?>
                    <a href='./logout.php'>Logout</a>
                    <a href='./home.php'>Home</a>
                    <a href='./settings.php'>Settings</a>
                    <?php } else { ?>

                      <a href='index.php'>Login</a>
                      <a href='signup.php'>Sign up!</a>
                      <div id='logo'>
                        <h3>Mr.Repair alpha website</h3>
                      </div>
                    <?php } ?>
              </div>
              <div class="col col-sm">
              </div>
          </div>
      </div>
  </header>
