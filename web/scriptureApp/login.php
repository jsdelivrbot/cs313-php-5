<?php
	session_start();
	if($_SESSION['authenticated'] == true){
		header('Location: scripturesForm.php');
		die(); 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">
</head>
<body>
	<h1> Scripture Journal </h1>
	<form action="loginAction.php" method="post" id="sign_in_form">
		<label><b>Username</b></label><br>
		<input type="text" name="username" placeholder="Username"><br>
		<label><b>Password</b></label><br>
		<input type="password" name="password" placeholder="Create Password"><br>
		<div id="wrapper">
		<br>
		<button id = "button" type="submit" form="sign_in_form" value="submit">Login</button>
		<br> 
		<br><a href="signup.php">New? Click here to sign up!</a>
	</div>
	</form>

	
</body>
</html>