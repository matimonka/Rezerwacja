<?php
Session_start();
if (!isset($_SESSION['zalogowany'])) 
{

header('Location: index.php');
exit();
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
				<li><a href="index.php"  >Strona główna</a></li>
				<li><a href="Obiekty.php" class="current">Wybierz boisko</a></li>
				<li><a href="Regulamin.php">Regulamin</a></li>
				<li><a href="Kontakt.php">Kontakt</a></li>
				
			</ul>
			</nav>
			<div id="leftmenu">
				<ul class="sport">
				<li><a href="Piłka nożna.php" class="current1" >Piłka nożna</a></li>
				<li><a href="Koszykówka.php">Koszykówka</a></li>
				<li><a href="Zajęcia fitness.php">Zajęcia fitness</a></li>
				<li><a href="Tenis ziemny.php">Tenis ziemny</a></li>
				</ul>
			</div>
				<div style="width: auto;" id="content">
					<b><h4>Wybierz obiekt do rezerwacji</h4></b>
						<div style="float:left">
                             <div class="menager">
            	    <a href="Formularz.php">
            	    										<img src="img/pilka1.jpg" alt="Piłka nożna halowa" title="Piłka nożna" border="0" width="160" height="120" />
																		</a> <br/>
            	    <br/><b>Piłka nożna halowa, Ślężna 21, Cena: 150zł/1H</b><br/>
							</div>
						</div>
						<div style="float:left">
                             <div class="menager">
            	    <a href="Formularz.php">
            	    										<img src="img/orlik.jpg" alt="Orlik" title="Orlik, Plac Legionów 1" border="0" width="160" height="120" />
																		</a> <br/>
            	    <br/><b>Orlik, Plac legionów 1, Cena 150zł/1H</b><br/>
							</div>
						</div>
				
					
				</div>
				<div style="clear:both;"></div>
					<div style="text-align:center; color:white; margin-top: 10px;" >
					COPYRIGHT: Mateusz Mońka 2022
					</div>
		</div>
	</body>
	
</html>