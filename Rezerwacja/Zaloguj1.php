<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";
		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				echo"Error: ".$polaczenie->connect_errno;
			}
			else
	{
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			
			$login = htmlentities($login, ENT_QUOTES, "UTF-8");
			  
			
			
			if ($wynik = @$polaczenie->query(
			sprintf("SELECT * FROM klient WHERE Login='%s'",
			mysqli_real_escape_string($polaczenie,$login))))
			{
				$ilu_klientow = $wynik->num_rows;
				if($ilu_klientow>0)
				{
					$wiersz = $wynik->fetch_assoc();
					
					if(password_verify($haslo,$wiersz['Haslo']))
					{
					
						$_SESSION['zalogowany'] = true;
						
						$_SESSION['Imie'] = $wiersz['Imie'];
						$_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
						
						
						unset($_SESSION['blad']);
						$wynik->close();
						header('Location: strona1.php');
					}
					else 
					{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
					}
					
					
				} else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
			
			}
			
		$polaczenie->close();
	
	}			
?>