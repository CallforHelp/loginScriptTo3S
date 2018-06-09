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
        			
        			<form method="post" action = "" >
        				<div class="form-row">
        				    <div class="col-md-12 mb-3">
						        <?php
						            echo "<b>Vielen Dank " . $_SESSION['anrede'] . ' ' . $_SESSION['vorname'] . ' ' . $_SESSION['nachname'] . ". Ihre Nachricht wurde an die Service Hotline gesendet und wird bearbeitet</br></br>Möchten Sie eine weitere Störung melden oder eine Anfrage an die Service Hotline senden?</b></br></br>";

	                            ?>
	                        </div>
					    </div>	

					
						<div class="form-row">
						    <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-secondary btn-block" class="form-control" name = "b_fehler">Fehler melden</button>
    						</div>
						    <div class="col-md-6 mb-3">
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