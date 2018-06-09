<?php 
session_start();
require_once("functions/db.php");
require_once("functions/login.php");


$schulnummer = $_GET['schulnummer'];
$_SESSION['school_id'] = $_GET['schulnummer'];
$pcname = $_GET['pcname'];
$_SESSION['pcname'] = $_GET['pcname'];


$statement = $pdo->prepare("SELECT * FROM schools WHERE school_id = :schulnummer");

$statement1 = $pdo->prepare("SELECT * FROM users WHERE school_id = :schulnummer");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Call for Help</title>
		<!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"> 
        <script type="text/javascript">
			function einblenden(){
        		var select = document.getElementById('select_contact').selectedIndex;
        		if(select == "Alternative") document.getElementById('Alternative').style.display = "block";
        		else document.getElementById('Alternative').style.display = "none";  
			}
		</script>
	</head>
	<body onload="einblenden()">
		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-6  align ="center"><br><br><br><br>
        		
        		    <form method="post">
        		        <div class="form-group">
        		        	<b>Willkommen im Bereich Call for Help</b><br><br><br>
        		        	<select  class="custom-select" method ="post" name="contact" id="select_contact" onchange="einblenden()">
        		        		<option selected>Bitte Kontaktperson ausw�hlen...</option>
						    	<?php
    								$statement1->execute(array('schulnummer' => $schulnummer));
									while($users = $statement1->fetch()) {
										$user = $users['Anrede'].' '.$users['vorname'].' '.$users['nachname'];
    			                		echo '<option value="'.$user.'">'.$user.'</option>';
    	                            }
    	                        ?>
    	                        <option value ="Alternative">Alternative Kontaktperson</option>	
                            </select><br>	                       
					    </div>
					    <div class="form-group" id="Alternative" style="display: none;">
							Dieser Text sollte nur sichtbar sein, wenn "Bier" und "Deutschland" ausgewählt wurden!
						</div>	
        				<div class="form-group">
        					<select  class="custom-select" method="post" name="location">
        						<option selected>Bitte Schule bzw. Standort auswählen...</option>
        				    	<?php 
    						        $statement->execute(array('schulnummer' => $schulnummer));
    						        while($school = $statement->fetch()) {
    						        	$_SESSION['id_hades'] = $school['id_hades'];
										$_SESSION['school_name'] = $school['school_name'];
    			                        echo '<option value="'.$school['school_name'].'">'.$school['school_name'].'</option>';
    	                            }
    	                        ?>
                            </select></br></br></br>                            
					    </div> 	

						<div class="form-group">
							<input type="password" id="inputPassword" name="password" placeholder = "Bitte geben Sie Ihr Passwort ein." class="form-control" required><br>
						</div> 
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control" >Anmelden</button>
						</div> 
					</form>
           		</div>
        	</div>
    	</div>
<?php
include ("templates/footer.php");
?>