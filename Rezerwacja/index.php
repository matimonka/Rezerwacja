<?php
Session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
	header('Location:strona1.php');
	exit();

	$str = "Hello world!";
echo substr($str, 6, 5);
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
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="container">

		<div id="logo">
			<div id="imglogo">
				<img src="img/logo.png">
			</div>
			<div id="textlogo">
				<form action="Zaloguj1.php" method="post">

					Login: <input class="okno" type="text" name="login" />
					Hasło: <input class="okno" type="password" name="haslo" />
					<input class="button" type="submit" value="Zaloguj się" />

					

					<br><a style="text-decoration:none; color:white; font-size: 20px;" href="rejestracja.php">Zarejestruj się za darmo!</a></br>

				</form>
				<?php
				if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
				?>
			</div>

			<div style="clear:both;"></div>
		</div>


		<nav id="topmenu">
			<ul class="menu">
				<li><a href="index.php" class="current">Strona główna</a></li>
				<li><a href="Obiekty.php">Wybierz boisko</a></li>
				<li><a href="Regulamin.php">Regulamin</a></li>
				<li><a href="Kontakt.php">Kontakt</a></li>

			</ul>
		</nav>
		<div style="clear:both;"></div>
		<div style="text-align:center; color:white; margin-top: 470px; ">
			COPYRIGHT: Mateusz Mońka 2022
		</div>

	</div>
</body>

</html>