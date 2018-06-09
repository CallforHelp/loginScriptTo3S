<?php 
    session_start();
    $location = $_POST['location'];
    $school_id = $_SESSION['school_id'];
    
    $contact = $_POST['contact'];
	$_SESSION['contact'] = $_POST['contact'];
	
	$password = $_POST['password'];
    $error = false;
    
    if(($location == 'Bitte Schule bzw. Standort auswählen...') or($contact == 'Bitte Kontaktperson auswählen...')) {
    	$error = true;
    }     
    if(strlen($password) == 0) {
        $error = true;
    }	  

	if(!$error) { 	
		$statement1 = $pdo->prepare("SELECT * FROM schools WHERE school_name = :location");
		$result1 = $statement1->execute(array('location' => $location));
		$school = $statement1->fetch();
	}

	

	//Überprüfung des Passworts
	if ($school !== false && (sha1($password) == $school['password'])) {
		$statement = $pdo->prepare("SELECT * FROM users WHERE school_id = :school_id");
		$result = $statement->execute(array('school_id' => $school_id));
		$user = $statement->fetch();
		
		$_SESSION['userid'] = $user['id_hades'];
		$_SESSION['email'] = $user['email'];

		header('LOCATION: contact.php');
		exit;
	} 

?>