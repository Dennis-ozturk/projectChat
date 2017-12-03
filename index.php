<?php include 'includes/header.php';

if(isset($_POST['submit'])) {
  echo htmlspecialchars($_POST['firstName']) . '<br>';
  echo htmlspecialchars($_POST['email']);
}

?>
<form action="" method="POST">
  <label>Name</label>
  <input type="text" name="firstName" id="firstName">
  <br>
  <label>Email</label>
  <input type="email" name="email" id="email">
  <br><br>
  <input type="submit" name="submit" value="submit">
</form>


<?php include 'includes/footer.php'; ?>
