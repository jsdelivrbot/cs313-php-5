<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">

	<title></title>
</head>
<body>
	<ul>
		<li><a href="scripturesForm.html">Scriptures</a></li>
		<li><a class="active" href="journal.php">Journal</a></li>
		<li><a href="about.html">About</a></li>	  
	</ul>
	<div class="pageContent">
	<h1>Scripture Journal</h1>
	<?php  
	session_start();
		require "dbConnect.php";
		$db = get_db();
		echo "<br>";
		// For the read only assignment I will use a hard coded user.
		$userId = 1; 
		$scriptureid = htmlspecialchars($_GET['scriptureid']);
		$_SESSION['scriptureid'] = $scriptureid;
		$stmt = $db->prepare('SELECT book, chapter, verse FROM scriptures where id=:scriptureId');
		$stmt->bindValue(':scriptureId', $scriptureid, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo "<h2>Add a note for " . $row[0]['book'] . " " . $row[0]['chapter'] . ":" . $row[0]['verse'] . '</h2>';
		?>
		<form class='noteForm' action="populateNote.php" method="POST">
			<textarea name="noteContent" rows="10" cols="40">Add your note...</textarea>
			<br>
			<?php
			$stmt = $db->prepare('SELECT DISTINCT on (name) id, name FROM topics ORDER BY name');
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			echo "Add related topics";
			foreach ($rows as $row) {
				$id = $row['id'];
				$name = $row['name'];
				echo "<div class='checkbox'>";
				echo "<input type='checkbox' name='topicsIds[]' value='$id'>$name";
				echo '<br>';
				echo "</div>";
			}
			echo "<input type='submit' name='Add Note'>";
			?>

			
		</form>
	</div>
</body>
</html>