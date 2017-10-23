<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">

	<title></title>
</head>
<body>
	<ul>
		<li><a class="active" href="scripturesForm.html">Scriptures</a></li>
		<li><a href="journal.php">Journal</a></li>
		<li><a href="about.html">About</a></li>	  
	</ul>
	<div class="pageContent">
	<h1>Scripture Journal</h1>
	<?php  
	session_start();
		require "dbConnect.php";
		$db = get_db();
		$chapter = $_POST['chapter'];
		$_SESSION['chapter'] = $chapter;
		$book = $_SESSION['book'];
		echo "<h2>$book</h2>";
		echo "<h2>Chapter $chapter</h2>";
		echo "<br>";
		$stmt = $db->prepare('SELECT DISTINCT id, verse, content FROM scriptures WHERE book=:book AND chapter=:chapter ORDER BY verse');
		$stmt->bindValue(':book', $book, PDO::PARAM_STR);
		$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $row) {
			echo '<b>'.$row['verse'].'   '. '</b>';
			echo "<a href=";
			echo "addNote.php?scriptureid=";
			echo $row['id'];
			echo ">[Add Note]</a>";
			echo $row['content'];
			echo '<br>';
		}
		
	?>

	</div>
</body>
</html>