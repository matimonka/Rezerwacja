<?php
Session_start();

if (!isset($_SESSION['udanarejestracja']))
{
header('Location:index.php');
exit();
}
else
{
	unset($_SESSION['udanarejestracja']);
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
			<h1 style="font-size: 30px; text-align:center; color:white;">Dziękujemy za rejestracje w serwisie. Możesz się już zalogować na swoje konto</h1>
	
	<a style="text-decoration:none; color:blue;" href="index.php">Zaloguj się na swoje konto!</a>
	<br /><br />
		</div>	
		
		

		
	</body>
	
</html>