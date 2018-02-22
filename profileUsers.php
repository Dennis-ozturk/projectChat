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
  $selectQuery = "SELECT name, friends FROM user_friends WHERE name='$current_user'";
  $friendsSql = mysqli_query($con, $selectQuery);

  if ($name == $current_user) {
    /*User adding themselves*/
    echo "<h4>You cant add urself</h4>";

  } elseif ($name != $current_user) {
    /*User adding*/
    if (mysqli_num_rows($friendsSql) == 0) {
      /*No email*/
      $queryFriendsInsert = mysqli_query($con, "INSERT INTO user_friends (name, friends) VALUES ('$current_user', '$name')");
      if ($queryFriendsInsert) {
        echo "Added Friend";
      }else {
        echo "Error";
      }
    }elseif (mysqli_num_rows($friendsSql) == 1) {
      /*Found email*/
      while ($row = $friendsSql->fetch_assoc()) {
        if ($current_user == $row['name'] and $name == $row['friends'] ) {
          /*Already friends*/
          echo "Already added";
          break;
        }elseif ($current_user == $row['name']) {
          if ($name == $row['friends']) {
            echo "Already friends";
            break;
          }else {
            $queryFriendsInsert = mysqli_query($con, "INSERT INTO user_friends (name, friends) VALUES ('$current_user', '$name')");
            if ($queryFriendsInsert) {
              echo "Added Friend";
            }else {
              echo "Error";
            }
          }
        }
      }
    }else {
      echo "Already friends";
    }
  }
}
?>

<?php include 'includes/footer.php'; ?>
