<?php
session_start();

if ($_SESSION['newpath'] != "")
	$anhang = 'Ja';
else
	$anhang = 'Nein';
if ($_SESSION['contact'] == 'Alternative')
    $kontakt = $_SESSION['anrede_neu'].' '.$_SESSION['vorname2'].' '.$_SESSION['nachname2'];
else
    $kontakt = $_SESSION['contact'];
    

if($_SESSION['button'] == "fehler"){
    $text = "Sehr geehrte Damen und Herren,</br></br>
    über Call for Help wurde folgende Störung erfasst:</br></br>
    - Fehlerkategorie: ".$_SESSION['fehler'].
    "</br>- Name/Modell der betroffenen Hard-/Software: ".$_SESSION['f_name'].
    "</br>- Wann tritt die Störung ein?</br>". 
    $_SESSION['f_wann'].
    "</br>- Wie macht sich die Störung bemerkbar?</br>".
    $_SESSION['f_wie'].
    "</br>- Wurden Fehlerquellen ausgeschlossen?</br>".
    $_SESSION['f_quellen'].
    "</br>- Anhang beigefügt? ".$anhang. 
    "</br></br>Störung gemeldet von: ".$kontakt.
    "</br></br>Diese Nachricht wurde automatisch generiert und bestätigt den Eingang Ihrer Störungsmeldung beim Schul-Support-Service. Nach erfolgter Bearbeitung erhalten Sie eine Rückmeldung mit der zugewiesenen Ticketnummer.</br></br>
    Mit freundlichen Grüßen,</br>
    - C4H -";
    $titel = "Fehlermeldung - ".$_SESSION['fehler'];
    $beschreibung = $_SESSION['f_name'];
    switch ($titel) {
    	case "Software":
        	$tag_id = "232;250";
        	break;
    	case "Praesentationssysteme":
        	$tag_id = "232;247";
        	break;
    	case "NAS":
        	$tag_id = "232;286";
        	break;
    	case "Server":
    		$tag_id = "232;251";
        	break;
    	case "Peripherie":
        	$tag_id = "232;248";
        	break;
	}
}
if($_SESSION['button'] == "anfrage"){
    $text = "Sehr geehrte Damen und Herren,</br></br>
    
    über Call for Help wurde folgende Anfrage gemeldet:</br></br>
    
    - Die gewünschte Anfrage: ".$_SESSION['anfrage'].
    "</br>- Anlaß der Anfrage: ".$_SESSION['anlaß'].
    "</br>- Gewünschte Zeitraum: ".$_SESSION['zeitraum'].
    "</br>- Weitere bemerkung</br>".
    $_SESSION['bemerkung'].
    "</br>- Anhang beigefügt? ".$anhang.
    "</br></br>Störung gemeldet von: ".$kontakt.
    "</br></br>Diese Nachricht wurde automatisch generiert und bestätigt den Eingang Ihrer Anfrage beim Schul-Support-Service. Nach erfolgter Bearbeitung erhalten Sie eine Rückmeldung mit der zugewiesenen Ticketnummer.</br></br>
    Mit freundlichen Grüßen,</br>
    - C4H -";
	$titel = "Anfrage - ".$_SESSION['anfrage'];
	$beschreibung = $_SESSION['anfrage'];
    switch ($titel) {
    	case "Vollwertige Change":
        	$tag_id = "232;250";
        	break;
    	case "Mini Change":
        	$tag_id = "232;247";
        	break;
    	case "Koordinatorengespraech":
        	$tag_id = "232;286";
        	break;
    	case "Beratung":
    		$tag_id = "232;251";
        	break;
	}
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$file = fopen('../ticket/ticket.csv', w);
fputcsv($file, array($_SESSION['id_hades'],$titel, $beschreibung,"",$_SESSION['pcname'],"",$_SESSION['userid'],$tag_id));
fclose($file);

$mail = new PHPMailer(); 
$mail->CharSet = 'utf-8';                             	// Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                            	// Enable verbose debug output
    $mail->isSMTP();                                 	// Set mailer to use SMTP
    $mail->Host = "";  				// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            	// Enable SMTP authentication
    $mail->Username = "";    // SMTP username
    $mail->Password = "";                    	// SMTP password
    $mail->SMTPSecure = "tls";                      	// Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                	// TCP port to connect to

    //Recipients
    $adress="";
    $mail->setFrom("fehlermeldung@3s-hamburg.de", "CALL-for-HELP");
    $mail->addAddress($adress);     					// Add a recipient
    if ($_SESSION['email2'] != "")
        $mail->addAddress($_SESSION['email2']);     	// Name is optional
    $mail->addReplyTo("", "3S - Sercice Hotline");
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    if ($_SESSION['newpath'] != "")
        $mail->addAttachment($_SESSION['newpath']); 	// Add attachments
    $mail->addAttachment('../ticket/ticket.csv');    	// Optional name

    //Content
    $mail->isHTML(true);                             	// Set email format to HTML
    $mail->Subject = "[3S C4H] [".$_SESSION['school_name']."] ".$titel;
    $mail->Body    = $text;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send())
    	header ('Location: ../final.php');
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>