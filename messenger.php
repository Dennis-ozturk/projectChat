<?php include 'includes/header.php'; ?>

<?php

if (isset($_SESSION['name'])) {
 ?>

 <div class="chatbox">
  <div class="box">
    <?php
      $name = $_SESSION['name'];
      $messenger = "SELECT name, dialog, date_added FROM messenger WHERE name='$name'";
      $queryMessenger = mysqli_query($con, $messenger);

      if (mysqli_num_rows($queryMessenger)) {
        while ($row = $queryMessenger->fetch_assoc()) {
          echo "<div>" . $row['dialog'] . "</div>";
        }
      }
     ?>
  </div>
 </div>

<?php } ?>
