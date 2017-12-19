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

  <nav class="navbar navbar-toggleable-md navbar-dark bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
      </li>
    </ul>
  </div>
</nav>

<header class="jumbotron">
      <div class="container">
          <div class="row row-header">
              <div class="jumbo-head">
                <img onclick="homePage()" src="img/techknight.png" style="float:left; width:120px; height:120px;">
                  <h1 onclick="homePage()" style="float:left; padding-left: 30px;padding-top:40px;">TechKnight</h1>
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
