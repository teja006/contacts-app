<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['signin'])) {
    header("Location: welcome.php");
}

if (isset($_POST['signin'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

   
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Sign In</title>
	
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign In</p>
			<p></p>
			<p class="login-register-text">Don't have an account? <a href="register.php">Sign Up</a>.</p>
			<p></p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign In</button>
			</div>
		</form>
	</div>
</body>
</html>