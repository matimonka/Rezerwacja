<?php
Session_start();

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
		<div id="container"> 
		
		  <div id="logo">
			<div id="imglogo">
				<img src="img/logo.png" >
			</div>
			<div id="textlogo">
			<?php
			
			echo "<p>Jestes zalogowany jako ".$_SESSION['Imie']," ", $_SESSION['Nazwisko'],  ' [<a style="text-decoration:none; color:blue;" href="logout.php">Wyloguj się!</a>]</p>';
			?>
			</div>
			<div style="clear:both;"></div>
		  </div>
			
			
			<nav id="topmenu">
			<ul class="menu">
				<li><a href="index.php"  class="current" >Strona główna</a></li>
				<li><a href="Obiekty.php">Wybierz boisko</a></li>
				<li><a href="Regulamin.php">Regulamin</a></li>
				<li><a href="Kontakt.php">Kontakt</a></li>
				
			</ul>
			</nav>
			<div id="content">
				<div id="welcome">
					<br >Witamy na stronie gdzie w szybki i przyjemny sposób</br>
					<br >możesz zarezerwować wybrany obiekt albo zajęcia sportowe.</br>

				
				
					
			</div>
			
			<div style="clear:both;"></div>
					<div style="text-align:center; color:white; margin-top: 10px;" >
					COPYRIGHT: Mateusz Mońka 2022
					</div>
		</div>
	</body>
	
</html>