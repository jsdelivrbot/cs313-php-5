<?php 
	session_start();
	require "dbConnect.php";
	$db = get_db();

	$username = $_POST['username'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$password_hashed = password_hash($password, PASSWORD_DEFAULT);

	$stmt = $db->prepare('INSERT INTO users (email, user_name, password) VALUES (:email, :user_name, :password)');
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
	$stmt->bindValue(':password', $password_hashed, PDO::PARAM_STR);
	$stmt->execute();
	$newId = $db->lastInsertId('users_id_seq');
	$stmt2 = $db->prepare(
		"INSERT INTO topics (name, user_id) values 
		('Faith', :user_id),
		('Sacrifice', :user_id), 
		('Charity', :user_id),
		('Hope', :user_id),
		('Prayer', :user_id);");
	$stmt2->bindValue(':user_id', $newId, PDO::PARAM_STR);
	$stmt2->execute();
	$_SESSION['username'] = $username;
	$_SESSION['email'] = $email;
	$_SESSION['authenticated'] = true;
	$_SESSION['user_id'] = $newId;
	header('Location: scripturesForm.php');
	die();
?>