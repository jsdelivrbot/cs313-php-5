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
	<h2 style="color: red">This uses a hard coded user id to call one test user from the database to test read-only function</h2>
	<?php  
	session_start();
		require "dbConnect.php";
		$db = get_db();
		echo "<br>";
		// For the read only assignment I will use a hard coded user.
		$userId = 1; 
		$stmt = $db->prepare('SELECT * FROM public.notes WHERE user_id=:userId ORDER BY date');
		$stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo '<table>';
		echo '<tr>
			    <th>Number</th>
			    <th>Content</th>
			    <th>Related Scripture</th>
			    <th>Date</th>
			  </tr>';
		foreach ($rows as $row) {
			$scriptureId = $row['scripture_id'];
			echo "<tr>";
			echo "<td>". $row['id'] . "</td>";
			echo "<td>". $row['content'] . "</td>";
			$stmt1 = $db->prepare('SELECT book, chapter, verse FROM public.scriptures WHERE id=:scriptureId');
			$stmt1->bindValue(':scriptureId', $scriptureId, PDO::PARAM_INT);
			$stmt1->execute();
			$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
			echo "<td>" . $rows1[0]['book'] . " " . $rows1[0]['chapter'] . ":" . $rows1[0]['verse'];
			echo "<td>". $row['date'] . "</td>";
			echo "</tr>";
		}
		echo '</table>';
		
	?>
	</div>
</body>
</html>