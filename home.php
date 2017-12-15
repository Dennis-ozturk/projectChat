<?php
include 'includes/header.php';
?>
<?php
  if(isset($_SESSION['name'])){
?>
<form class="body-post" action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="document">
  <br>
  <textarea style="width: 300px; height: 80px;" type="text" name="text" rows="8" id="text"></textarea>
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

  $document = rand(1000, 100000)."-".$_FILES['document']['name'];
  $document_loc = $_FILES['document']['tmp_name'];
  $document_size = $_FILES['document']['size'];
  $document_type = $_FILES['document']['type'];
  $documentFolder="uploads/documents/";

  move_uploaded_file($document_loc,$documentFolder.$document);

  $result = mysqli_query($con, $sqlEmail);
  $file = $con->query("SELECT file from users where email='$email'");
  //If true already taken else false
    if(mysqli_num_rows($result) == 1 ){
      while($row = $file->fetch_assoc()){
      $imageFile = $row['file'];
      $query = mysqli_query($con,"INSERT INTO posts (email, name, body, file, document, type, size, date_added) VALUES ('$email', '$name' ,'$body', '$imageFile','$document','$document_type','$document_size', '$date')");
      if($query){
      }else{
        echo "Could not send";
      }
      unset($_POST);
      header('Location:'.$_SERVER['PHP_SELF']);
    }
    }else {
      echo "Could not send to database";
    }

}
?>


<div class="comments">
<?php
if(isset($_SESSION['name'])){
  $bodyAll = "SELECT body, email, name, id, file, date_added from posts";
  $result = mysqli_query($con, $bodyAll);
  if(mysqli_num_rows($result)){
    while ($row = $result->fetch_assoc()) {
      echo "<div class=". 'body-comment' .">";
        echo "<div class=" . 'body-name' . " id=" . 'email' . $row['id'] .">";
        echo "<img class=" . 'body-image' . " src=" . 'uploads/profile/' . $row['file'] .">";
        echo "</div>";
        echo "<span class=" . 'body-date' . ">" . $row['date_added'] . "</span>";
        echo "<span class=" . 'body-content' . " id=" . 'body' .">" . $row['body'] . "</span>" ;
      echo "</div>";
    }
  }
}else {
  echo "<h1>Login please</h1>";
}
?>
</div>
<div class="files">
<?php
if(isset($_SESSION['name'])){
  $document = "SELECT document from posts";
  $result_document = mysqli_query($con, $document);
  if(mysqli_num_rows($result_document)){
    while ($row1 = $result_document->fetch_assoc()) {
        echo "<div class=" . 'body-document' . ">";
        echo "<a class=" . 'body-image' . " href=" . 'uploads/documents/' . $row1['document'] .">Link</a>";
        echo "<br>";
        echo "</div>";
    }
  }
}else {
  echo "<h1>Login please</h1>";
}
?>
</div>
<?php include 'includes/footer.php'; ?>
