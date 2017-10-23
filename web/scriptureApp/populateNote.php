<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php  
	session_start();
		require "dbConnect.php";
		$db = get_db();
		
		// For the read only assignment I will use a hard coded user.
		$userId = 1; 
		$scriptureid = $_SESSION['scriptureid'];
		$noteContent = $_POST['noteContent'];
		$topicsIds = $_POST['topicsIds'];
		echo var_dump($_POST);
		$date = date("Y-m-d");
		$stmt = $db->prepare('INSERT INTO notes (content, user_id, scripture_id, date) VALUES (:noteContent, :userid, :scriptureid, :date)');
		$stmt->bindValue(':scriptureid', $scriptureid, PDO::PARAM_INT);
		$stmt->bindValue(':noteContent', $noteContent, PDO::PARAM_STR);
		$stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
		$stmt->bindValue(':date', $date, PDO::PARAM_STR);
		$stmt->execute();

		$noteId = $db->lastInsertId("notes_id_seq");

		
		foreach ($topicsIds as $topicId) {
			$stmt = $db->prepare('INSERT INTO notes_topic (note_id, topic_id) VALUES (:noteid, :topicid)');
			$stmt->bindValue(':noteid', $noteId, PDO::PARAM_INT);
			$stmt->bindValue(':topicid', $topicId, PDO::PARAM_INT);
			$stmt->execute();
			echo $topicId;
		}
		

		header("location:journal.php");
		die();
	
?>
</body>
</html>
		