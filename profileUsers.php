<?php include 'includes/header.php'; ?>


<?php

$public_profile = "SELECT name, email, file, type, size, date_added FROM users";

$public_result = mysqli_query($con, $public_profile);

if (mysqli_num_rows($public_result)) {
  while ($row = $public_result->fetch_assoc()) { ?>
    <div style="float:left;" class="<?php echo $row['name'] ?>">
      <h4 id="public-profile-name" class="public-profile-name">Username: <?php echo $row['name'] ?></h4>
      <img class="public-profile-image" src="uploads/profile/<?php echo $row['file'] ?>" alt="">

      <form method="post">
        <select selected="selected" name="name">
          <option><?php echo $row['name'] ?></option>
        </select>
        <input type="submit" name="add" value="Add"/>
      </form>

    </div>

<?php
  }
}

if (isset($_POST['add'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $current_user = $_SESSION['name'];
  $selectQuery = "SELECT name, friends FROM user_friends";
  $friendsSql = mysqli_query($con, $selectQuery);

  if ($name == $current_user) {
    /*User adding themselves*/
    echo "<h4>You cant add urself</h4>";

  } elseif ($name != $current_user) {
    /*User adding*/
    if (empty(mysqli_num_rows($friendsSql))) {
      /*If mysql rows are empty*/
      $queryFriendsInsert = mysqli_query($con, "INSERT INTO user_friends (name, friends) VALUES ('$current_user', '$name')");
      if ($queryFriendsInsert) {
        echo "Added";
      }else {
        echo "Error";
      }
      echo ' <script> window.location.replace("http://localhost/projectChat/profileUsers.php"); </script>';
    }elseif (mysqli_num_rows($friendsSql)) {
      /*If mysql rows not empty*/
      while ($row = $friendsSql->fetch_assoc()) {
        if ($name == $row['friends'] && $current_user == $row['name'] ) {
          /*Already friends*/
          echo "Already added";
        } elseif ($current_user == $row['name'] && $name != $row['friends']) {
          /*Add friend*/
          $queryFriendsInsert = mysqli_query($con, "INSERT INTO user_friends (name, friends) VALUES ('$current_user', '$name')");
          if ($queryFriendsInsert) {
            echo "Added";
          }else {
            echo "Error";
          }
          echo ' <script> window.location.replace("http://localhost/projectChat/profileUsers.php"); </script>';
        }elseif (empty($row['name'])) {
          $queryFriendsInsert = mysqli_query($con, "INSERT INTO user_friends (name, friends) VALUES ('$current_user', '$name')");
          if ($queryFriendsInsert) {
            echo "Added";
          }else{
            echo "Error";
          }
          echo ' <script> window.location.replace("http://localhost/projectChat/profileUsers.php"); </script>';
        }

      }
    }
  } else {
    echo "error";
  }
}
?>

<?php include 'includes/footer.php'; ?>
