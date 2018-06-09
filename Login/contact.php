<?php 
session_start();
require_once("functions/db.php");


if (isset ($_POST['b_fehler']))  
    header('LOCATION: error.php'); 
if (isset ($_POST['b_anfrage']))
    header('LOCATION: inquiry.php');
    
    
include ("templates/header.php");
?>

		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-9  align ="center">
        			
        			<form method="post" > 
                        <?php
							if($_SESSION['contact'] == 'Alternative')
	                            echo '<b>Bitte geben Sie Ihre Kontaktdaten ein.</b><br><br>
	                            <div class="form-row">
    								<div class="col-md-2 mb-3">
      									<label for="validationCustom01">Anrede</label>
      									<select class="custom-select" name="anrede_neu" method="post">
      							    		<option selected>Auswählen...</option>
    	                        			<option value="anrede_herr">Herr</option>
    	                        			<option value="anrede_frau">Frau</option>
                           				</select></br>
    								</div>
    								<div class="col-md-5 mb-3">
      									<label for="validationCustom02">Vorname</label>
      									<input type="text" class="form-control" id="validationCustom02" name = "vorname2" placeholder="Vorname">
    								</div>
    								<div class="col-md-5 mb-3">
      									<label for="validationCustom02">Nachname</label>
      									<input type="text" class="form-control" id="validationCustom02" name = "nachname2" placeholder="Nachname">
    								</div>
  								</div>';
    					?>
					    <div class="form-group">
						
						</div> 					
						<div class="form-row">
						    <div class="col-md-6 mb-3">
						        <label for="meldung">Möchten Sie eine Störung melden?</label>
                                <button type="submit" class="btn btn-secondary btn-block" class="form-control" name = "b_fehler">Fehler melden</button>
    						</div>
						    <div class="col-md-6 mb-3">
						        <label for="anfrage">(Mini-) Change/ Gespräch </label>
                                <button type="submit" class="btn btn-secondary btn-block" class="form-control" name = "b_anfrage">Anfrage Senden</button>
    						</div>
						</div> 
					</form>
          		</div>
        	</div>
    	</div>
<?php
include ("templates/footer.php");
?>
