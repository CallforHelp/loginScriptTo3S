<?php 
session_start();
require_once("functions/db.php");

$_SESSION['anrede_neu'] = $_POST['anrede_neu'];
$_SESSION['vorname2'] = $_POST['vorname2'];
$_SESSION['nachname2'] = $_POST['nachname2'];

$_SESSION['button'] = "anfrage";
include ("templates/header.php");
?>
		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-8  align ="center">
        			
        			<form method="post" action="functions/upload.php" enctype="multipart/form-data">
					    <div class="form-group">
						
						</div> 
				        <div class="form-row">
						    <div class="col-md-6 mb-3">
						        <label for="anfrage"><b>- Die gew�nschte Anfrage:</b></label>
    						</div>
						    <div class="col-md-6 mb-3">
						        <select class="custom-select" name="anfrage" method="post">
						            <option selected>Auswählen...</option>
    	                            <option value="Vollwertige Change">Vollwertige Change</option>
    	                            <option value="Mini Change">Mini Change</option>
    	                            <option value="Koordinatorengespraech">Koordinatorengespräch</option>
    	                            <option value="Beratung">Beratung</option>
                                </select>
    						</div>
    					</div>
				        <div class="form-row">
						    <div class="col-md-6 mb-3">
						        <label for="anlaß"><b>- Anlaß der Anfrage:</b></label>
    						</div>
						    <div class="col-md-6 mb-3">
						        <select class="custom-select" name="anlaß" method="post">
						            <option selected>Auswählen...</option>
    	                            <option value="Neue Anschaffung">Neue Anschaffung</option>
    	                            <option value="Unzuverlaessiges System">Unzuverlässiges System</option>
    	                            <option value="Regel Change">Regel Change</option>
    	                            <option value="Umstrukturierung">Umstrukturierung</option>
                                </select>
    						</div>
    					</div>
						<div class="form-group">
							<label for="zeitraum"><b>- Gew�nschte Zeitraum</b></label>
							<textarea class="form-control" name="zeitraum"  cols="25" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Wann sollte das Gespräch/ Change stattfinden?"></textarea>
						</div> 
						<div class="form-group">
							<label for="bemerkung"><b>- Weitere Bemerkungen</b></label></br>
							<textarea class="form-control" name="bemerkung"  cols="25" rows="5" maxlength="10000" wrap="soft" method="post" placeholder = "Was wird angeschaft? (Hard-/ Software: Name, Modell, Version, Anzahl....)"></textarea></br>
						</div> 
                        <div class="form-group">
                            <label for="datei"><b>- Hier k�nnen Sie eine Datei (Screenshot..) hochladen.</b></label>
                            <input type="file" name="datei">
                        </div>					
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control">Senden</button>
						</div> 
					</form>
          		</div>
        	</div>
    	</div>
<?php
include ("templates/footer.php");
?>

