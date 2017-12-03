<?php include 'includes/header.php';
include 'db/config.php';

//Set Vars
$name = mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$pass = mysqli_real_escape_string($con,$_POST['password']);
$date = mysqli_real_escape_string($con, date("Y-m-d") );

//Look for same email
$sqlEmail = "SELECT email FROM users WHERE email='$email'";
$result = mysqli_query($con, $sqlEmail);

//If true already taken else false
if(mysqli_num_rows($result) == 1 ){
  echo "Sorry this email is already take";
}else {
  $query = mysqli_query($con,"INSERT INTO users (name, email, password, date_added) VALUES ('$name', '$email', '$pass', '$date')");

  if($query){
    echo "Registered";
  }else{
    echo "Could not register, try again";
  }

}
?>
<!-- Signup form -->
<form action="" method="POST">
  <label>Name</label>
  <input type="text" name="name" id="name">
  <br>
  <label>Email</label>
  <input type="email" name="email" id="email">
  <br>
  <label>Password</label>
  <input type="password" name="password" id="password">
  <br><br>
  <input type="submit" name="submit" value="submit">
</form>


<?php include 'includes/footer.php'; ?>
