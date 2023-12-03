<?php
Session_start();
if (isset($_POST['email']))
{
	//Udana walidacja
	$wszystko_OK=true;
	// Sprawdzenie poprawnosci Loginu
	$nick = $_POST['nick'];
	//Sprawdzenie dlugosci loginu
	if((strlen($nick)<3  || (strlen($nick)>20)))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Login musi posiadać od 3 do 20 znaków!";
		}
	//Sprawdzenie poprawnosci hasla
	
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	
	if((strlen($haslo1)<8) || (strlen($haslo1)>20))
	{
		$wszystko_OK=false;
		$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
	}
	
	if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne";	
		}
	
	$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
	
	
	
	
	
	//Sprawdzenie poprawnosci email.
	$email = $_POST['email'];
	$email2 = filter_var($email, FILTER_SANITIZE_EMAIL);
	
	if((filter_var($email,FILTER_VALIDATE_EMAIL)==false) || ($email2!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podany E-mail jest nie poprawny!";
		}
	
	
	//Sprawdzenie czy zaakceptowano regulamin
	if(!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Muisz zaakceptować regulamin!";
		}
	
	//sprawdzenie Imienia
	$imie1 = $_POST['imie1'];
	if(strlen($nick)<1)
		{
			$wszystko_OK=false;
			$_SESSION['e_imie1']="Musisz podać swoje Imie";
		}
	
	//sprawdzenie Nazwiska
	$nazwisko1 = $_POST['nazwisko1'];
	if(strlen($nick)<1)
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko1']="Musisz podać swoje Nazwisko";
		}
	
	require_once "connect.php";  
	mysqli_report(MYSQLI_REPORT_STRICT);
	try
	{
	 $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);	
	 if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//sprawdzenie czy w bazie jest juz podany email
				$wynik = $polaczenie->query("SELECT id_klienta FROM klient WHERE Email='$email'");
				if(!$wynik) throw new Exception($polaczenie->error);
				$ile_takich_maili=$wynik->num_rows;
				if($ile_takich_maili>0)
					{
						$wszystko_OK=false;
						$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu email";
					}
				
				//sprawdzenie czy w bazie jest juz podany login
				$wynik = $polaczenie->query("SELECT id_klienta FROM klient WHERE Login='$nick'");
				if(!$wynik) throw new Exception($polaczenie->error);
				$ile_takich_loginow=$wynik->num_rows;
				if($ile_takich_loginow>0)
					{
						$wszystko_OK=false;
						$_SESSION['e_nick']="Istnieje już konto z takim Loginem. Wybierz inny Login";
					}
				
				if($wszystko_OK==true)
					{
						if($polaczenie->query("INSERT INTO klient VALUES (NULL, '$nick', '$haslo_hash', '$imie1', '$nazwisko1', '$email')"))
						{
							$_SESSION['udanarejestracja']=true;
							header('Location:witam.php');
						}
						else
						{
							throw new Exception($polaczenie->error);
						}
					}
		
				$polaczenie->close();
			}
			
	}
	catch(Exception $e)
		{
			echo '<span style ="color:red;">Ups coś poszło nie tak. Spróbuj ponownie później!</span>';
			echo 'Info'.$e;
		}
}
?>
<!DOCTYPE html>
<html lang="pl">

	<head>
	
		<meta charset="utf-8">
		<title>Rezerwacja obiektów sportowych</title>
		<meta name="description" content="Strona umożliwiająca rezerwacje obietków sportowych na terenie Wrocławia">
		<meta name="keywords" content="sport, rezerwacja, obiekty sportowe">
		<meta name="author" content="Mateusz Mońka">
		<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
		
		
		<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->


	</head>

	<body>

		<div id="container1">
			<div id="formularz">
			<h1 style="font-size: 30px; text-align:center;">Witamy w formularzu rejestracji - Tutaj możesz założyć swoje konto</h1>
				<form method="post">
				
					<br />Nickname: <br /><input class="okno1" type="text" name="nick"><br />
					
					<?php 
					if(isset($_SESSION['e_nick']))
						{
						echo '<div style="color:red;">'.$_SESSION['e_nick'].'</div>';
						unset($_SESSION['e_nick']);
						}
					?>
					<br />Hasło:<br /> <input class="okno1" type="password" name="haslo1"><br />
					
					<?php 
					if(isset($_SESSION['e_haslo']))
						{
						echo '<div style="color:red;">'.$_SESSION['e_haslo'].'</div>';
						unset($_SESSION['e_haslo']);
						}
					?>
					
					<br />Potwórz hasło:<br />  <input class="okno1" type="password" name="haslo2"><br />
					<br />Imie:<br /> <input class="okno1"  type="text" name="imie1"><br />
					
					<?php 
					if(isset($_SESSION['e_imie1']))
						{
						echo '<div style="color:red;">'.$_SESSION['e_imie1'].'</div>';
						unset($_SESSION['e_imie1']);
						}
					?>
					<br />Nazwisko:<br /> <input class="okno1" type="text" name="nazwisko1"><br />
					
					<?php 
					if(isset($_SESSION['e_nazwisko1']))
						{
						echo '<div style="color:red;">'.$_SESSION['e_nazwisko1'].'</div>';
						unset($_SESSION['e_nazwisko1']);
						}
					?>
					<br />E-mail:<br /> <input class="okno1" type="text" name="email"><br />
					
					<?php 
					if(isset($_SESSION['e_email']))
						{
						echo '<div style="color:red;">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
						}
					?>
					
					<label>
					<input type="checkbox" name="regulamin" /> Akceptuje <a style="color:white;" href="Regulamin.php">Regulamin</a></li>
					</label>
					<?php 
					if(isset($_SESSION['e_regulamin']))
						{
						echo '<div style="color:red;">'.$_SESSION['e_regulamin'].'</div>';
						unset($_SESSION['e_regulamin']);
						}
					?>
					<br />
					<input class="button" type="submit" value="Załóż konto" />
					
				
			
				</form>
			
			</div>

			<div style="clear:both;"></div>
					<div style="text-align:center; color:white; margin-top: 10px;" >
					COPYRIGHT: Mateusz Mońka 2022
					</div>
		</div>	
		
		

		
	</body>
	
</html>