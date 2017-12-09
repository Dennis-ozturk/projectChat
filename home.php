<?php
include 'includes/header.php';
?>

<form action="" method="POST">
  <label><?php echo $_SESSION['name']; ?></label>
  <br>
  <label>Body</label>
  <textarea type="text" name="text" rows="8" id="text"></textarea>
  <br>
  <br>
  <input type="submit" name="submitBody" value="submit" id="submit">
</form>

<?php
if(isset($_POST['submitBody'])){
  $email = mysqli_real_escape_string($con, $_SESSION['email']);
  $body = mysqli_real_escape_string($con, $_POST['text']);
  $date = mysqli_real_escape_string($con, date("Y-m-d") );


  $sqlEmail = "SELECT email FROM users WHERE email='$email'";

  $result = mysqli_query($con, $sqlEmail);

  //If true already taken else false
    if(mysqli_num_rows($result) == 1 ){

      $query = mysqli_query($con,"INSERT INTO posts (email, body, date_added) VALUES ('$email', '$body', '$date')");

      if($query){
        echo "Sent to database";
      }else{
        echo "Could not send";
      }

    }else {
      echo "Could not send to database";
    }
}
?>



<?php

  $bodyAll = "SELECT body, email, id from posts";
  $result = mysqli_query($con, $bodyAll);

  if(mysqli_num_rows($result)){
    while ($row = $result->fetch_assoc()) {
      echo "<div id=" . 'comment' . ">";
      echo "<div id=" . 'email' .">" . $row['email'] . "</div>" ;
      echo "<div id=" . 'test' .">" . 'ok' . "</div>" ;
      echo "<div id=" . 'body' .">" . $row['body'] . "</div>" ;
      echo "<br>";
      echo "</div>";
    }
  }
?>



<?php include 'includes/footer.php'; ?>
