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
		$noteid = htmlspecialchars($_GET['noteid']);
		$_SESSION['noteid'] = $noteid;
		echo "<h2>Edit your note: </h2>";
		?>
		<form class='noteForm' action="updatenote.php" method="POST">
			<textarea name="noteContent" rows="10" cols="40">
				<?php
					$stmt = $db->prepare('SELECT content FROM notes where id = :noteid;');
					$stmt->bindValue(':noteid', $noteid, PDO::PARAM_STR);
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					echo $row['content'];
				?>
			</textarea>
			<br>
			<input type='submit' name='Add Note'>";
		</form>
		<br>
		<br>
		<br>
			
		</div>
		

		
	</div>
</body>
</html>