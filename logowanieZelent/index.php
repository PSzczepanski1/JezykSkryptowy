<?php
 
    session_start();
     
?>
<!DOCTYPE html>

<html>
	<head>
	</head>
	
	<body>
		<form action="login.php" method="POST">
			Login: <br /><input type="text" name="login" /> <br />
			Haslo: <br /><input type="password" name="haslo" /> <br />
			<input type="submit" value="Zaloguj się" />
		</form><br>

		<?php
    		if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
		?>
	</body>
</html> 