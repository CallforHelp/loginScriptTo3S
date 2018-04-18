<?php 
session_start();
require_once("db.php");
require_once("login.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Call for Help</title>
	</head>
	<body>
		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-4  align ="center">
        			<center><img width="200px" height="200px" src="images/logo.png"></center><br><br><br><br>
        			
        			<form method="post">

						<div class="form-group">
							<label for="email"><b>E-Mail Adresse</b></label><br>
							<input type="text" id="inputEmail" placeholder = "Bitte geben Sie Ihre E-Mail Adresse ein." name="email" class="form-control">
						</div>
				
						<div class="form-group">
							<label for="inputPassword"><b>Passwort</b></label><br>
							<input type="password" id="inputPassword" name="password" placeholder = "Bitte geben Sie Ihren Passwort ein." class="form-control" ><br>
						</div> 
					
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control" href="login.php">Anmelden</button>
						</div> 
					</form>
          		</div>
        	</div>
    	</div>
    	
    	<hr>
    		<div class="container" align = "center">
  				<footer>
        			<p>Powered by <a href="http://www.3s-hamburg.de" target="_blank">3S Schul-Support-Service</a></p>
        			<img src="images/3s_logo.png">
      			</footer>
   			</div> 
	</body>
</html>