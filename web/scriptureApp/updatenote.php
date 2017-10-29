<?php  
	session_start();
		require "dbConnect.php";
		$db = get_db();
		
		$noteid = $_SESSION['noteid'];
		$noteContent = $_POST['noteContent'];
		$stmt = $db->prepare('UPDATE notes SET content = :notecontent WHERE id = :id;');
		$stmt->bindValue(':notecontent', $noteContent, PDO::PARAM_STR);
		$stmt->bindValue(':id', $noteid, PDO::PARAM_INT);
		$stmt->execute();

		header("location:journal.php");
		die();
	
?>

		






