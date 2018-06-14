<?php
	session_start();

	require_once "connect.php";

	$con = new mysqli($host, $db_user, $db_password, $db_name);
	mysqli_select_db($con, $db_name) or die("B³¹d przy wyborze bazy danych");
	mysqli_query($con, "SET CHARACTER SET UTF8");
	
	$login = $_POST['login'];
	$password = $_POST['password'];
	
	$q = mysqli_query($con, "SELECT count(id) FROM user");
	$row = mysqli_fetch_row($q);
	
	if($row)
		$currId = $row[0] + 1;
	
	$qq = "SELECT login, password FROM user WHERE id = $id";
	$resultt = $con->query($qq); 
	if($resultt->num_rows > 0){
		$q = "UPDATE user SET login='$login', password='$password' WHERE id = $id";
		$resultt = $con->query($q); 
		if($resultt)
			$_SESSION['info'] = 'Użytkownik został zaktualizowany';
		else
			$_SESSION['info'] = 'Użytkownik nie został zaktualizowany :(';
	}else{
		if(mysqli_query($con, "INSERT INTO user(login, password) VALUES('$login', '$password')")) {
			$_SESSION['q'] = "Dodano $currId uzytkownika do systemu";
		} else {
			$_SESSION['q'] = "Nieudana $currId -ta próba dodania uzytkownika";
		}
	}
	
	header("Location: base.php");
	
?>