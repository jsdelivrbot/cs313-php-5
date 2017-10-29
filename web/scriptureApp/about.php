<?php  
	session_start();
	if($_SESSION['authenticated'] == false){
		header('Location: login.php');
		die(); 
	}
	require "dbConnect.php";
	$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">

	<title></title>
</head>
<body>
	<ul>
		<li><a href="scripturesForm.php">Scriptures</a></li>
		<li><a href="journal.php">Journal</a></li>
		<li><a  class="active" href="about.php">About</a></li>	
		<br>
		<br>
		<li><a class = "logout" href="logout.php">Logout</a></li>  
	</ul>
	<div class="pageContent">
	<h1>Scripture Journal</h1>
	<h2>About</h2>
	<h3>This is a web app to study scriptures and keep notes in relation to your favorite scriptures. This is a read-only prototype.</h3>
	</div>
</body>
</html>