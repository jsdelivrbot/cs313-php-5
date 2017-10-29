<?php
	session_start();
	if($_SESSION['authenticated'] == false){
		header('Location: login.php');
		die(); 
	}
?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">

	<title></title>
</head>
<body>
	<ul>
		<li><a class="active" href="scripturesForm.php">Scriptures</a></li>
		<li><a href="journal.php">Journal</a></li>
		<li><a href="about.php">About</a></li>	 
		<br>
		<br>
		<li><a class = "logout" href="logout.php">Logout</a></li>
	</ul>
	<div class="pageContent">
	<h1>Scripture Journal</h1>
	<?php 
		echo "WELCOME " . $_SESSION['username'] . ", to add a note select a scripture";
	?>
	<form action="scripturesDatabase.php" method="post">
		<p>Select Volume: </p>
		<select name="volume">
			<option value="Old Testament">Old Testament</option>
			<option value="New Testament">New Testament</option>
			<option value="Book of Mormon">Book of Mormon</option>
			<option value="Doctrine and Covenants">Doctrine and Covenants</option>
			<option value="Pearl of Great Price">Pearl of Great Price</option>
		</select>
		<input type="submit">
	</form>
	</div>
</body>
</html>