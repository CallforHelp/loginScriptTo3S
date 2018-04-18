<?php 
session_start();
require_once("db.php");
$mail = $_SESSION['email'];
$statement2 = $pdo->prepare("SELECT * FROM schools");
$school = $statement2->execute();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Call for Help</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"> 
    </head>
	<body>
		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-6  align ="center">
        			<center><img width="200px" height="200px" src="images/logo.png"></center><br><br><br><br>
        			
        			<form method="post" action = "send.php">
        				<div class="form-group">
						    <?php 
	                            echo 'Herzlich Willkommen ' . $_SESSION['anrede'] . ' ' . $_SESSION['vorname'] . ' ' . $_SESSION['nachname'] . " im Bereich Call for Help.</br>
                                Sie betreuen folgende Schulen. Wählen Sie bitte den Standort aus: ";
	                        ?>
					    </div> 
					    
        				<div class="form-group">
        				    <?php
						        echo '<select class="custom-select" name="schule">';
						        while($school = $statement2->fetch()) {
		                            if($school['email'] == $mail) {
			                            echo '<option value="'.$school['school_name'].'">'.$school['school_name'].'</option>';
		                            } 
	                            }
                            	echo '</select></br></br>';
                            ?>
					    </div> 					    
        			
        				<div class="form-group">
						    <?php 
	                            echo "Hier können Sie die Fehlermeldung beschreiben.</br></br></br>";
	                        ?>
					    </div>


						<div class="form-group">
							<label for="fehler"><b>Fehler Kategorie</b></label></br>
						    <select class="custom-select" name="fehler">
    	                        <option value="Client">Client</option>
    	                        <option value="Digitales Whiteboard">Digitales Whiteboard</option>
    	                        <option value="NAS">NAS</option>
    	                        <option value="Peripherie">Peripherie</option>
                                <option value="Server">Server</option>
                            </select></br>
						</div>
				
						<div class="form-group">
							<label for="beschreibung"><b>Beschreibung</b></label></br>
							<textarea class="form-control" name="html_elemente"  cols="25" rows="10" maxlength="10000" wrap="soft"></textarea></br>
						</div> 
					
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control">Senden</button>
						</div> 
					</form>
          		</div>
        	</div>
    	</div>
  	</div>
</form>
	<hr>
    	<div class="container" align = "center" position ="fixed">
  			<footer>
        		<p>Powered by <a href="http://www.3s-hamburg.de" target="_blank">3S Schul-Support-Service</a></p>
        		<img src="images/3s_logo.png">
      		</footer>
   		</div> 
    </body>
</html>

