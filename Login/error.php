<?php 
session_start();
require_once("functions/db.php");

$_SESSION['button'] = "fehler";

$_SESSION['email2'] = $_POST['email2'];
$_SESSION['anrede_neu'] = $_POST['anrede_neu'];
$_SESSION['vorname2'] = $_POST['vorname2'];
$_SESSION['nachname2'] = $_POST['nachname2'];
$mail = $_SESSION['email'];
include ("templates/header.php");
?>
<!DOCTYPE html>

		<div class="container" style ="margin-top: 10px">
			<div class="row justify-content-center">
        		<div class="col-md-8  align ="center">
        			
        			<form method="post" action="functions/upload.php" enctype="multipart/form-data">
					    <div class="form-group">
						
						</div> 
				        <div class="form-row">
						    <div class="col-md-7 mb-1">
						        <label for="fehler"><b>- Wählen Sie bitte eine Kategorie aus.</b></label>
    						</div>
						    <div class="col-md-5 mb-1">
						        <select class="custom-select" name="fehler" method="post">
						            <option selected>Auswählen...</option>
    	                            <option value="Software">Software</option>
    	                            <option value="Praesentationssysteme">Präsentationssysteme</option>
    	                            <option value="NAS">NAS</option>
    	                            <option value="Peripherie">Peripherie</option>
                                    <option value="Server">Server</option>
                                    <option value="Sonstiges">Sonstiges</option>
                                </select>
    						</div>
    					</div>
				        <div class="form-row">
						    <div class="col-md-9 mb-1">
						        <label for="f_name"><b>- Name/Modell der betroffenen Hard-/Software</b></label>
						        <input type="text" class="form-control" id="validationCustom03" name = "f_name" placeholder="Softwarename, Gerätemodell ...." method="post" required>
    						</div>	
						    <div class="col-md-3 mb-1">
                                <label for="f_anzahl"><b>Anzahl</b></label>
                                <input type="text" class="form-control" id="validationCustom03" name = "f_anzahl" placeholder="0" required>
    						</div>

    					</div>						
    					<div class="form-group">
							<label for="f_wann"><b>- Wann tritt die Störung ein?</b></label>
							<textarea class="form-control" name="f_wann"  cols="20" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Regelmäßig? Dauerhaft? Beim Hochfahren?"></textarea>
						</div>
    					<div class="form-group">
							<label for="f_wie"><b>- Wie macht sich die Störung bemerkbar?</b></label>
							<textarea class="form-control" name="f_wie"  cols="20" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Wenn mehrere Benutzer sich anmelden...."></textarea>
						</div>
						<div class="form-group">
							<label for="f_quellen"><b>- Welche Fehlerquellen wurden bereits ausgeschlossen?</b></label>
							<textarea class="form-control" name="f_quellen"  cols="20" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Neustart, Überprüfung der Anschlüsse ...."></textarea>
						</div> 
						<div class="form-group">
							<label for="beschreibung"><b>- Weitere Bemerkungen</b></label></br>
							<textarea class="form-control" name="beschreibung"  cols="20" rows="3" maxlength="10000" wrap="soft" method="post"></textarea>
						</div> 
                        <div class="form-group">
                            <label for="datei"><b>- Hier können Sie eine Datei (Screenshot..) hochladen.</b></label>
                            <input type="file" name="datei">
                        </div>
					
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control" name="senden">Senden</button>
						</div> 
					</form>
          		</div>
        	</div>
    	</div>
<?php
include ("templates/footer.php");
?>

