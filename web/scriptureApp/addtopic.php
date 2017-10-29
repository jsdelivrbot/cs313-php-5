<?php  
	session_start();
	if($_SESSION['authenticated'] == false){
		header('Location: login.php');
		die(); 
	}
	require "dbConnect.php";
	$db = get_db();

	$newTopic = $_POST['new_topic'];
	$userId = $_SESSION['user_id'];
	$stmt = $db->prepare('INSERT INTO topics (name, user_id) values (:newTopic, :user_id)');
	$stmt->bindValue(':newTopic', $newTopic, PDO::PARAM_STR);
	$stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
	$stmt->execute();
	header('Location: addNote.php?scriptureid=' . $_SESSION['scriptureid']);




?>