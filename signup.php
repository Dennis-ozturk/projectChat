<?php
include 'includes/header.php';
?>

<!-- Signup form -->
<form class="form" style="width:320px; margin:0 auto; margin-top: 140px; margin-bottom:140px;" action="" method="POST" enctype="multipart/form-data">
  <h4>Register</h4>
  <input type="text" name="name" id="name" placeholder="Username">
  <br>
  <input type="email" name="email" id="email" placeholder="Email">
  <br>
  <input type="password" name="password" id="password" placeholder="Password">
  <input type="file" name="file" />
  <br><br>
  <input type="submit" name="submit" value="submit" id="submit">
</form>

<?php
if(isset($_POST['submit'])){
  //Set Vars
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $pass = mysqli_real_escape_string($con,$_POST['password']);
  $date = mysqli_real_escape_string($con, date("Y-m-d") );

  // User profile picture
  $file = rand(1000, 100000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
  $file_size = $_FILES['file']['size'];
  $file_type = $_FILES['file']['type'];
  $folder="uploads/profile/";

  move_uploaded_file($file_loc,$folder.$file);

  //Look for same email
  $sqlEmail = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($con, $sqlEmail);

  //If true already taken else false / Checks so long as the password input is bigger than or equal to 8 characters
  if(strlen($pass) >= 8){
    if(mysqli_num_rows($result) == 1 ){
      echo "Sorry this email is already take";
    }else {
      $encrypt = md5($pass);
      $query = mysqli_query($con,"INSERT INTO users (name, email, password, file, type, size, date_added) VALUES ('$name', '$email', '$encrypt', '$file', '$file_type', '$file_size', '$date')");

      if($query){
        echo "Registered";
      }else{
        echo "Could not register, try again";
      }
    }
  }else {
    echo "Password to short, atleast 8 characters";
  }
}
?>

<?php
include 'includes/footer.php';
?>
