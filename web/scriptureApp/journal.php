<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="scriptureStyle.css">

	<title></title>
</head>
<body>
	<ul>
		<li><a href="scripturesForm.php">Scriptures</a></li>
		<li><a class="active" href="journal.php">Journal</a></li>
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
		echo "<br>";
		$userId = $_SESSION['user_id']; 
		$stmt = $db->prepare('SELECT * FROM public.notes WHERE user_id=:userId ORDER BY date');
		$stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo '<h2>Notes</h2>';
		echo '<table>';
		echo '<tr>
			    <th>Content</th>
			    <th>Related Scripture</th>
			    <th>Related Topics</th>
			    <th>Date</th>
			  </tr>';
		foreach ($rows as $row) {
			$scriptureId = $row['scripture_id'];
			echo "<tr>";
			echo "<td>". $row['content'] . "</td>";
			$stmt1 = $db->prepare('SELECT book, chapter, verse FROM public.scriptures WHERE id=:scriptureId');
			$stmt1->bindValue(':scriptureId', $scriptureId, PDO::PARAM_INT);
			$stmt1->execute();
			$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
			echo "<td>" . $rows1[0]['book'] . " " . $rows1[0]['chapter'] . ":" . $rows1[0]['verse'];
			$stmt2 = $db->prepare('SELECT name from topics t INNER JOIN notes_topic nt ON nt.topic_id = t.id WHERE nt.note_id = :note_id;');
			$stmt2->bindValue(':note_id', $row['id'], PDO::PARAM_INT);
			$stmt2->execute();
			echo '<td>';
			while ($topicRow = $stmt2->fetch(PDO::FETCH_ASSOC)) {
				echo $topicRow['name'];
				echo '<br>';
			}
			echo '</td>';
			echo "<td>". $row['date'] . "</td>";
			echo "<td><a href='editnote.php?noteid=". $row['id'] . "''>Edit</a></td>";
			echo "</tr>";

		}
		echo '</table>';
		
	?>

	</div>
</body>
</html>