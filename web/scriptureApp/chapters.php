<!DOCTYPE html>
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
	session_start();
		require "dbConnect.php";
		$db = get_db();
		$book = $_POST['book'];
		$_SESSION["book"] = $book;
		$volume = $_SESSION['volume'];
		echo "<h2>$volume</h2>";
		echo "<h2>$book</h2>";
		echo "<br>";
		$stmt = $db->prepare('SELECT DISTINCT chapter FROM scriptures WHERE book=:book ORDER BY chapter');
		$stmt->bindValue(':book', $book, PDO::PARAM_STR);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$_SESSION['book'] = $book;
		echo "<form action='verses.php' method='post'>";
		echo "Select Chapter: ";
		echo "<select name='chapter'>";
		foreach ($rows as $row) {
			echo "<option value=";
			echo $row['chapter'];
			echo ">";
			echo $row['chapter'];
			echo "</option>";
		}
		echo "</select>";
		echo "<input type='submit'>";
		echo "</form>";

	?>
	</div>
</body>
</html>