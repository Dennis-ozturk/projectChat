<?php
include './db/config.php';
session_start();
?>
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

<header class="jumbotron">
      <div class="container">
          <div class="row row-header">
              <div class="jumbo-head">
                <img src="img/techknight.png" style="float:left; width:120px; height:120px;">
                  <h1 style="float:left; padding-left: 30px;padding-top:40px;">TechKnight</h1>
                  <?php if(isset($_SESSION['name'])) { ?>
                    <a href='./logout.php'>Logout</a>
                    <a href='./home.php'>Home</a>
                    <a href='./settings.php'>Settings</a>
                    <br>
                    <br>
                    <label>Welcome <?php echo $_SESSION['name'] ?>!</label>
                    <?php } else { ?>

                      <a href='login.php'>Login</a>
                      <a href='signup.php'>Sign up!</a>
                    <?php } ?>
              </div>
          </div>
      </div>
  </header>
