<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">

</head>
<body>
	<h1> Scripture Journal </h1>
	<form action="signupAction.php" method="post" id="signUp">
		<label><b>Username</b></label><br>
		<input type="text" name="username" placeholder="Username"><br>
		<label><b>Email</b></label><br>
		<input type="text" name="email" placeholder="Enter Email"><br>
		<label><b>Password</b></label><br>
		<input type="password" name="password" placeholder="Create Password"><br>
		<div id='wrapper'>
		<br>
		<br>
		<button id = "button" type="submit" form="signUp" value="submit">Sign Up!</button> <br>
		<br><a href="login.php">Click HERE if you already have an account.</a>
	</div>
	</form>


</body>
</html>