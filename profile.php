<?php include 'includes/header.php'; ?>
<?php

$name = $_SESSION['name'];

if (isset($_SESSION['name'])) {
  $profile = "SELECT name, email, password, file, type, size, date_added FROM users WHERE name='$name'";
  $resultProfile = mysqli_query($con, $profile);

  if (mysqli_num_rows($resultProfile)) {
    while ($row = $resultProfile->fetch_assoc()) {
      echo "<div class=" . 'profile' .">";
        echo "<div class=" . 'profile-section' .">";
          echo "<img class=" . 'profile-image' . " src=" . 'uploads/profile/' . $row['file'] .">";
          echo "<h4> Username: ". $row['name'] ."</h4>";
          echo "<h4> Email: ". $row['email'] ."</h4>";
        echo "</div>";
      echo "</div>";
    }
  }
}
?>


<?php include 'includes/footer.php'; ?>
