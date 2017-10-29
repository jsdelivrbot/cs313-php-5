<?php
	session_start();
	if($_SESSION['authenticated'] == false){
		header('Location: login.php');
		die(); 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">

	<title></title>
</head>
<body>
	<ul>
		<li><a class="active"href="scripturesForm.php">Scriptures</a></li>
		<li><a href="journal.php">Journal</a></li>
		<li><a href="about.php">About</a></li>	
		<br>
		<br>
		<li><a class = "logout" href="logout.php">Logout</a></li>  
	</ul>
	<div class="pageContent">
	<h1>Scripture Journal</h1>
	<?php  
	
		require "dbConnect.php";
		$db = get_db();
		echo "<br>";
		$userId = $_SESSION['user_id'];  
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
			$stmt = $db->prepare('SELECT DISTINCT on (name) id, name FROM topics where user_id = :userId');
			$stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			echo "Add related topics";
			echo "<div id='checkbox_group'>";
			foreach ($rows as $row) {
				$id = $row['id'];
				$name = $row['name'];
				echo "<div class='checkbox'>";
				echo "<input type='checkbox' name='topicsIds[]' value='$id'>$name";
				echo "</div>";
				echo '<br>';
			}
			echo "</div>";
			echo "<input type='submit' name='Add Note'>";

			?>
		</form>
		<br>
		<br>
		<br>
		<div class="wrapper">
		<form class="noteForm" id="new_topic_form" action="addtopic.php" method="POST">
			<p>Add a NEW topic</p>
			<input type="text" name="new_topic">
			<button class="button" type="submit" form="new_topic_form" value="submit">Add New Topic</button>
		</form>
		
			
		</div>
		

		
	</div>
</body>
</html>