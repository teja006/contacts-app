<?php 

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Add Contacts</h2>
				<input type="text" class="field" placeholder="Name">
				<input type="text" class="field" placeholder="Ph No">
				<input type="text" class="field" placeholder="Email">
				<button class="btn">save</button>
			</div>
		</div>
	</div>
</body>
</html>