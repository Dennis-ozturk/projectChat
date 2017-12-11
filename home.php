<?php
include 'includes/header.php';
?>

<?php
if(isset($_SESSION['name'])){
?>
<form action="" method="POST">
  <label><?php echo $_SESSION['name']; ?></label>
  <br>
  <label>Body</label>
  <textarea style="width: 300px;" type="text" name="text" rows="8" id="text"></textarea>
  <br>
  <br>
  <input type="submit" name="submitBody" value="submit" id="submit">
</form>
<?php
}else {
}
?>

<?php
if(isset($_POST['submitBody'])){
  $email = mysqli_real_escape_string($con, $_SESSION['email']);
  $name = mysqli_real_escape_string($con, $_SESSION['name']);
  $body = mysqli_real_escape_string($con, $_POST['text']);
  $date = mysqli_real_escape_string($con, date("Y-m-d H:i:s") );


  $sqlEmail = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($con, $sqlEmail);

  $file = $con->query("SELECT file from users where email='$email'");

  //If true already taken else false
    if(mysqli_num_rows($result) == 1 ){
      while($row = $file->fetch_assoc()){

      $imageFile = $row['file'];
      $query = mysqli_query($con,"INSERT INTO posts (email, name, body, file, date_added) VALUES ('$email', '$name' ,'$body', '$imageFile', '$date')");
      if($query){

      }else{
        echo "Could not send";
      }
    }

    }else {
      echo "Could not send to database";
    }
}
?>



<?php
if(isset($_SESSION['name'])){

  $bodyAll = "SELECT body, email, name, id, file, date_added from posts";
  $result = mysqli_query($con, $bodyAll);

  if(mysqli_num_rows($result)){
    while ($row = $result->fetch_assoc()) {
        echo "<div class=" . 'body-comment' . " id=" . 'comment' . $row['id'] . ">";
        echo "<img class=" . 'body-image' . " src=" . 'uploads/' . $row['file'] ."  ";
        echo "<div class=" . 'body-name' . " id=" . 'email' . $row['id'] .">" . $row['name'] . '<span id="body-date">' . '-' . $row['date_added'] . '</span>' . '-' . "</div>" ;
        echo "<div class=" . 'body-content' . " id=" . 'body' .">" . $row['body'] . "</div>" ;
        echo "<br>";
        echo "</div>";
    }
  }
}else {
  echo "<h1>Login please</h1>";
}
?>

<?php include 'includes/footer.php'; ?>
