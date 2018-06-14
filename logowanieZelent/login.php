<?php

	session_start(); 
	require_once "connect.php";

	$connect = new mysqli($host, $db_user, $db_password, $db_name);

	if($connect->connect_errno!=0) {
		echo "Error: ".$connect->connect_errno;
	}else{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$sql = "SELECT * FROM user WHERE login='$login' AND password='$haslo'";
		
		if($result = $connect->query($sql)){

			$users = $result->num_rows;
			if($users>0){

				$row = $result->fetch_assoc();
				$_SESSION['user'] = $row['login'];


				unset($_SESSION['blad']);
				$result->free_result();
				
				header('Location: base.php');
			}else{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: index.php');
			}
		}

		$connect->close();	
	}

?>