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
        <h1 class="title" onclick="homePage()">Forum</h1>
        <div class="navbar">
          <?php if(isset($_SESSION['name'])) { ?>
            <span class="user-name">Welcome <?php echo $_SESSION['name'] ?>!</span>
            <br>
          <a href='./logout.php'>Logout</a>
          <a href='./home.php'>Home</a>
          <a href='./profile.php'>Profile</a>
          <a href='./profileUsers.php'>All users</a>
          <a href='./settings.php'>Settings</a>
          <a href='./messenger.php'>Live chat</a>

          <br>
        </div>
        <form class="user-name" style="float:right;margin-top: 15px;" action="" method="post" enctype="multipart/form-data">
          <h4>Search users</h4>
          <input type="text" name="search">
          <input type="submit" name="submitSearch">
        </form>
        <?php

        if (isset($_POST['submitSearch'])) {
          $search_value = mysqli_real_escape_string($con, $_POST['search']);
          $select_value = "SELECT * FROM users WHERE name LIKE '%$search_value%'";
          $result_value = mysqli_query($con, $select_value);

          if (mysqli_num_rows($result_value)) {
            echo "<span class=". 'user-name' .">Result: </span>";
            while ($row = $result_value->fetch_assoc()) {
              echo "<br />";
              echo "<img class=" . 'search-image' . " src=" . 'uploads/profile/' . $row['file'] .">";
              echo "<span class=". 'user-name' .">". $row['name'] ." </span> ";
            }
          }
        }
         ?>
        <?php } else { ?>
        <a href='login.php'>Login</a>
        <a href='signup.php'>Sign up!</a>
        <?php } ?>
      </header>
