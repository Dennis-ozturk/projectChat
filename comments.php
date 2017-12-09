<?php
include 'includes/header.php';
?>

<?php

if(isset($_POST['email'])){
  echo $_POST['email'];
  echo $_POST['body'];
}

?>


<?php
include 'includes/footer.php';
?>
