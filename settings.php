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
<input type="password" name="newPassword1">
<br>
<span> Enter old password: </span>
<br>
<input type="password" name="newPassword2">
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
if(isset($_POST['subSettings'])){
	$oldPassword = mysqli_real_escape_string($con, $_SESSION['oldPassword']);
	$newPassword1 = mysqli_real_escape_string($con, $_SESSION['newPassword1']);
	$newPassword2 = mysqli_real_escape_string($con, $_SESSION['newPassword2']);
	$sqlEmail = "SELECT email FROM users WHERE email='$email' ";

	$currentPassword = $con->query("SELECT password");

	$encrypt = md5($oldPassword);

	$result = mysqli_query($con, $sqlEmail);

	if(mysqli_num_rows($result)){
		if
	}else{

	}




}

?>

<?php
include 'includes/footer.php'
?>
