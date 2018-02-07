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
		<span> Enter new password: </span>
		<br>
		<input type="password" name="newPassword1">
		<br>
		<span> Enter new password: </span>
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
	$oldPassword = mysqli_real_escape_string($con, $_POST['oldPassword']);
	$newPassword1 = mysqli_real_escape_string($con, $_POST['newPassword1']);
	$newPassword2 = mysqli_real_escape_string($con, $_POST['newPassword2']);
	$email = $_SESSION['email'];
	$sqlEmail = "SELECT email FROM users WHERE email='$email' ";


	$currentPassword = $con->query("SELECT password FROM users WHERE email='$email'");

	$encryptOld = md5($oldPassword);

	$result = mysqli_query($con, $sqlEmail);


	if (mysqli_num_rows($result) == 1) {
		while ($row = $currentPassword->fetch_assoc()) {
			if ($row['password'] == $encryptOld) {
				$encryptNew = md5($newPassword1);
				$sqlUpdate = "UPDATE users SET password='$encryptNew' WHERE email='$email'";
				if (mysqli_query($con, $sqlUpdate)) {
					echo "Updated";
				}else {
					echo "something went wrong";
				}
			}else {
				echo "Something went wrong";
			}
		}
	}

}

?>

<?php
include 'includes/footer.php'
?>
