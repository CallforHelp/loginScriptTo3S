<?php
session_start();

$_SESSION['fehler']	 	= $_POST['fehler'];
$_SESSION['f_name']		= $_POST['f_name'];
$_SESSION['f_wann'] 	= $_POST['f_wann'];
$_SESSION['f_wie'] 		= $_POST['f_wie'];
$_SESSION['f_quellen'] 	= $_POST['f_quellen'];
$_SESSION['anfrage'] 	= $_POST['anfrage'];
$_SESSION['anlaß'] 		= $_POST['anlaß'];
$_SESSION['zeitraum'] 	= $_POST['zeitraum'];
$_SESSION['bemerkung'] 	= $_POST['bemerkung'];

$upload_folder = '../upload/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
if($_FILES['datei']['name']!=''){
    //Überprüfung der Dateiendung
    $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif','txt','pdf');
    if(!in_array($extension, $allowed_extensions)) {
     die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
    }
     
    //Überprüfung der Dateigröße
    $max_size = 500*1024; //500 KB
    if($_FILES['datei']['size'] > $max_size) {
     die("Bitte keine Dateien größer 500kb hochladen");
    }
     
    //Pfad zum Upload
    $new_path = $upload_folder.$filename.'.'.$extension;
    $_SESSION['newpath'] =  $new_path;
     
    //Neuer Dateiname falls die Datei bereits existiert
    if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
        $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
        $_SESSION['newpath'] =  $new_path;
        $id++;
        } while(file_exists($new_path));
    }
     
    //Alles okay, verschiebe Datei an neuen Pfad
    move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
    header ('LOCATION: ../functions/send.php');}
else
    header ('LOCATION: ../functions/send.php');

    

?>