<?php include 'includes/header.php'; ?>

<form class="form" style="width:320px; margin:0 auto; margin-top: 140px; margin-bottom:140px;" action="" method="POST" enctype="multipart/form-data">
  <h4>Recover password</h4>
  <input type="email" name="email" id="email" placeholder="Email">
  <br><br>
  <input type="submit" name="submit" value="submit" id="submit">
</form>


<?php

if (isset($_POST['submit'])) {

  $email = mysqli_real_escape_string($con, $_POST['email']);

  $to = "$email";
  $subject = "Recover password";
  $txt = "Hello world!";
  $headers = "From: dennisozturk97@gmail.com" . "\r\n" .
  "CC: dennis.dada@hotmail.se";

  mail($to,$subject,$txt,$headers);

}
/*
$queryUpdate = mysqli_query($con, "UPDATE users SET password='$random' WHERE email='$email'");
if ($queryUpdate) {
  echo "Sent";
}else {
  echo "Something went wrong";
}
*/
 ?>


<?php include 'includes/footer.php'; ?>
