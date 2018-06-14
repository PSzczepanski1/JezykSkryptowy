<?php

	session_start(); 
	require_once "connect.php";
?>	

<?php


	$conn = new mysqli($host, $db_user, $db_password, $db_name);
	
	$q = "SELECT id, login, password FROM user ";
	
	$edit = isset($_GET['edytuj']) ? $_GET['edytuj'] : null; 
	$delete = isset($_GET['kasuj']) ? $_GET['kasuj'] : null;
	
	if($delete){
		$q = "DELETE FROM user WHERE id = $delete ";
		$_SESSION['info'] = 'Uzytkownik został skasowany';
		header("Location: base.php");
	}
	
	$q = "SELECT id, login, password FROM user ";
	
	$result = $conn->query($q);

	if($edit){
		$qq = "SELECT id, login, password FROM user WHERE id = $edit ";
		$resultt = $conn->query($qq); 
		$editUser = $resultt->fetch_assoc();
		$qq = "UPDATE user SET login='$login', password='password' WHERE id = $edit";
	}else{
		$editUser = null;
	}

	$conn->close();
?>

<!DOCTYPE html>

<html>
	<head>
	</head>
	
	<body>
		<a href = "index.php">Powrót do strony głownej</a>

		<form action="dodaj.php" method="POST">
			Login: <input type="text" name="login" value="<?php echo $editUser['login'] ?>"><br><br>
			Haslo: <input type="text" name="password" value="<?php echo $editUser['password'] ?>" ><br><br>
			<br><br>
			<input type="submit" value="Dodaj użytkownika">
		</form><br>

		<?php
			if(isset($_SESSION['q']))
				echo $_SESSION['q'];
			else {
				$_SESSION['q'] = "";
			}
		?>

		<?php
			if(isset($_SESSION['info'])){
			echo '<h4>' . $_SESSION['info'] . '</h4>';
			// unset($_SESSION['info']);
			}
		?>

		<table style="border: 1px solid black; width: 100%;">
			<td>Id </td><td>Login </td><td>Hasło </td><td>Edycja </td><td>Usuń </td>
			<?php

				
				if(is_a($result, 'mysqli_result') && $result->num_rows > 0){
					while($row = $result->fetch_assoc()) {
					$r = '<tr><td>' . $row['id'] . '</td><td>' . $row['login'] . '</td><td>' . $row['password'] . '</td>';
					$r .= '<td><a href="base.php?edytuj='.$row['id'].'">Edit</a></td>';
					$r .= '<td><a href="base.php?kasuj='.$row['id'].'" onclick="return confirm(\'Skasować?\')">Kasuj</a></td>';
					$r .= '</tr>';  
					echo $r;
					}
				}else{
					echo '<tr><td colspan="6">Brak wyników!</td></tr>';
				}
		?>
		
	</body>
</html> 