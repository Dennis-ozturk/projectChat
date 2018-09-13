<?php include 'includes/header.php'; ?>

<?php
if (isset($_SESSION['name'])) {
?>
 <?php
    //Get current user from nav
    $username = $_SERVER['QUERY_STRING'];
    $current_user_using = $_SESSION['name'];
    $userTable = "SELECT name, file, type, size date_added FROM users WHERE name <> '$current_user_using'";

    $userQuery = mysqli_query($con, $userTable);
    /* Users to chat with */
    if (mysqli_num_rows($userQuery)) {
      while ($row = $userQuery->fetch_assoc()) { ?>
        <div class="users <?php echo $row['name'] ?>">
          <h4 id="public-profile-name" class="public-profile-name">Username: <?php echo $row['name'] ?></h4>
          <img class="public-profile-image" src="uploads/profile/<?php echo $row['file'] ?>" alt="">
          <a class="profile-link" href='messenger.php?<?php echo $row['name']?>'>Chat</a>
        </div>
      <?php
      }
    }
  ?>

 <div class="chatbox">
  <div class="box">
    <!--Display Messages-->
    <?php
      $displayQuery = "SELECT * from user_msg WHERE to_usr='$username' AND from_usr='$current_user_using' OR to_usr='$current_user_using' AND from_usr='$username'";

      $getQuery = mysqli_query($con, $displayQuery);

      if (mysqli_num_rows($getQuery)) {
        while ($row1 = $getQuery->fetch_assoc()) {
          echo $row1['from_usr']. ": " . $row1['inbox_info'];
          echo "<br />";
        }
      }else {
        echo "Click to chat with somebody";
      }
     ?>
     <!--/Display Messages-->
  </div>
  <!--Send Messages-->
  <form class="" method="POST">
    <textarea class="text_area" type="text" name="msg_text" rows="8" id="text"></textarea>
    <br>
    <input type="submit" name="submit" value="submit" />
  </form>
  <?php
    // If user submit
    if (isset($_POST['submit'])) {
      $msg = mysqli_real_escape_string($con,$_POST['msg_text']);
      $user_to = $_SERVER['QUERY_STRING'];
      $current_user = $_SESSION['name'];
      //Insert into messenger variable
      $selectQuery = "INSERT INTO user_msg (name, from_usr, inbox_info, to_usr) VALUES ('$current_user', '$current_user', '$msg', '$user_to')";
      //If no error insert into mysql else error
      if (mysqli_query($con, $selectQuery)) {
        echo "New record created successfully";
        echo ' <script> window.location.replace("http://localhost/projectChat/messenger.php?' . $user_to .'"); </script>';
      } else {
        echo "Error: " . $selectQuery . "<br>" . mysqli_error($con);
      }
    }
   ?>
  <!--/Send Messages-->
 </div>
<?php } ?>

<?php include 'includes/footer.php'; ?>
