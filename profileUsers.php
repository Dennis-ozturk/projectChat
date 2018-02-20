<?php include 'includes/header.php'; ?>


<?php

$public_profile = "SELECT name, email, file, type, size, date_added FROM users";

$public_result = mysqli_query($con, $public_profile);

if (mysqli_num_rows($public_result)) {
  while ($row = $public_result->fetch_assoc()) {
    echo "<div class=" . 'public-profile-page' .">";
      echo "<h4 id=" . 'public-profile-name' ." class=". 'public-profile-name' ."> Username: ". $row['name'] ."</h4>";
      echo "<img class=" . 'public-profile-image' . " src=" . 'uploads/profile/' . $row['file'] .">";
    echo "</div>";
  }
}

?>


<?php include 'includes/footer.php'; ?>
