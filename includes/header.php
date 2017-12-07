<?php
include './db/config.php';
session_start();
?>


<?php if(isset($_SESSION['name'])) { ?>
  <a href='./logout.php'>Logout</a>
  <a href='./home.php'>Home</a>
  <?php } else { ?>

    <a href='index.php'>Login</a>
    <a href='signup.php'>Sign up!</a>
    <div id='logo'>
      <h1>findFriends</h1>
    </div>
  <?php } ?>
