<?php
include 'includes/header.php';
?>

<?php
if(isset($_SESSION['username'])) {
 header("location: home.php");
}

?>


<!-- Login form -->
<h4>Login</h4>
<form style="width:320px; margin:0 auto;" action="" method="POST">
  <label>Email</label>
  <input type="email" name="email" id="email">
  <br>
  <label>Password</label>
  <input type="password" name="passwordLogin" id="password">
  <br>
  <br>
  <input type="submit" name="submitLogin" value="submit" id="submit">
</form>

<?php
if(isset($_POST['submitLogin'])){
  //Get info from above form
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $pass = mysqli_real_escape_string($con,$_POST['passwordLogin']);
  $name = $con->query("SELECT name from users where email='$email'");

  //Convert to md5 security
  $pass = md5($pass);

  //Get info from user
  $sqlInfo = "SELECT email from users where email='$email' AND password='$pass'";
  $result = mysqli_query($con, $sqlInfo);
  $name = $con->query("SELECT name from users where email='$email'");
  $password = $con->query("SELECT password from users where email='$email'");

  if(mysqli_num_rows($result) == 1){
    while ($row = $name->fetch_assoc()) {
      $_SESSION['name'] = $row['name'];
      echo "<br>";
    }
    while ($row1 = $password->fetch_assoc()){
      if($row1['password'] == $pass){
        echo ' <script> window.location.replace("http://localhost/projectDiary/home.php"); </script>';
      }else {
        echo "false";
      }
    } while ($row2 = $result->fetch_assoc()) {
      $_SESSION['email'] = $row2['email'];
    } while ($row3 = $name->fetch_assoc()){
      $_SESSION['name'] = $row3['name'];
      echo "<br>";
    }
  }else {
    echo "Error";
  }
}
?>

<br><br><br>

<!-- Signup form -->
<h4>Register</h4>
<form style="width:320px; margin:0 auto;" action="" method="POST">
  <label>Username</label>
  <input type="text" name="name" id="name">
  <br>
  <label>Email</label>
  <input type="email" name="email" id="email">
  <br>
  <label>Password</label>
  <input type="password" name="password" id="password">
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

  //Look for same email
  $sqlEmail = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($con, $sqlEmail);

  //If true already taken else false
  if(strlen($pass) >= 8){
    if(mysqli_num_rows($result) == 1 ){
      echo "Sorry this email is already take";
    }else {
      $encrypt = md5($pass);
      $query = mysqli_query($con,"INSERT INTO users (name, email, password, date_added) VALUES ('$name', '$email', '$encrypt', '$date')");

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

<?php include 'includes/footer.php'; ?>
