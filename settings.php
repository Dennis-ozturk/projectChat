<?php
include 'includes/header.php';
?>
<?php 
if (isset($_SESSION['name'])){
?>
<div class="settings">
<h2>Settings</h2>
<span>Current email: <?php echo $_SESSION['email']; ?> </span>
<br>
<form method="POST" enctype="multipart/form-data">
<h4 style="text-align: left;">Change Password:</h4>
<span> Enter old password: </span>
<br>
<input type="password" name="oldPassword">
<br>
<span> Enter old password: </span>
<br>
<input type="password" name="newPassword">
<br>
<span> Enter old password: </span>
<br>
<input type="password" name="newPassword">
<br>
<br>
<input type="submit" name="subSettings" value="Confirm">
</form>
</div>
<?php 
}else {
?>

<h1>Login please</h1>

<?php 
}
?>

<?php
include 'includes/footer.php'
?>
