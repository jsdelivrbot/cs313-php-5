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
		try {
			$user = 'postgres';
			$password = '4434Baptism';
			$db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $user, $password);
		} catch (PDOException $ex)
			{
			  echo 'Error!: ' . $ex->getMessage();
			  die();
			}
		$volume = $_POST["volume"];
		$_SESSION["volume"] = $volume;
		echo "<h2>$volume</h2>";
		echo "<br>";
		$stmt = $db->prepare('with subtable as (SELECT distinct on (book) book, id, volume from scriptures where volume=:volume)
							 SELECT id, book from subtable where volume=:volume order by id;');
		$stmt->bindValue(':volume', $volume, PDO::PARAM_STR);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo "<form action='chapters.php' method='post'>";
		echo "Select book:";
		echo "<select name='book'>";
		foreach ($rows as $row) {
			echo "<option value='".$row['book']."'>";
			echo $row['book'];
			echo "</option>";
		}
		echo "</select>";
		echo "<input type='submit'>";
		echo "</form>";
	?>
	<div>
</body>
</html>

