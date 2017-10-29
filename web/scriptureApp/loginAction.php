<?php 
	session_start();
	require "dbConnect.php";
	$db = get_db();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $db->prepare('SELECT * FROM users WHERE user_name=:username;');
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	echo $row['password'];
	if (password_verify($password, $row['password'])) {
		echo "Authenticated!";
		$_SESSION['username'] = $row['user_name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['authenticated'] = true;
		$_SESSION['user_id'] = $row['id'];
		header('Location: scripturesForm.php');
		die();
	} else {
		echo "Access Denied";
	}

?>