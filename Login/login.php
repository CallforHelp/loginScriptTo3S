<?php 
    session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$statement1 = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	$result1 = $statement1->execute(array('email' => $email));
	$user = $statement1->fetch();

	//Überprüfung des Passworts
	if ($user !== false && ($password == $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];
		$_SESSION['anrede'] = $user['Anrede'];
		$_SESSION['vorname'] = $user['vorname'];
		$_SESSION['nachname'] = $user['nachname'];
		$_SESSION['email'] = $user['email'];
		header('LOCATION:action_page.php');
		exit;
	} 

?>