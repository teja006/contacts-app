<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['sign-up'])) {
    header("Location: index.php");
}

if (isset($_POST['Signup'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$secret = md5($_POST['secret']);

	if ($password == $password || $email==$email || $secret == $secret) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO signup (email,password,secret)
					VALUES ('$email', '$password','$secret')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$email = "";
				$_POST['password'] = "";
				$_POST['secret'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Sign up</title>
	
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign Up</p>
			<p></p>
			<p class="login-register-text">Already have an account? <a href="index.php">Sign In</a>.</p>
			<p></p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="secret" name="secret" value="<?php echo $_POST['secret']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign up</button>
			</div>
			By clicking the "Sign Up" button, You are creating an account, and you agree to the terms of use
		</form>
	</div>
</body>
</html>