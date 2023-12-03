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
				<li><a href="Piłka nożna.php"  >Piłka nożna</a></li>
				<li><a href="Koszykówka.php">Koszykówka</a></li>
				<li><a href="Zajęcia fitness.php" class="current1">Zajęcia fitness</a></li>
				<li><a href="Tenis ziemny.php">Tenis ziemny</a></li>
				</ul>
			</div>
				<div id="content">
					<br><h4>Wybierz obiekt do rezerwacji</h4></br>
						<div style="float:left">
                             <div class="menager">
            	    <a href="Formularz.php">
            	    										<img src="img/Spinning.jpg" alt="Spinning" title="Spinning" border="0" width="160" height="120" />
																		</a> <br/>
            	    <br/><b>Spinning, Kazimierza Wielkiego 45, Cena: 25 zł/1h</b><br/>
							</div>
						</div>
						<div style="float:left">
                             <div class="menager">
							 <a href="Formularz.php">
            	    										<img src="img/Yoga.jpg" alt="Yoga" title="Yoga" border="0" width="160" height="120" />
																		</a> <br/>
            	    <br/><b>Yoga, Kazimierza Wielkiego 45, Cena: 30 zł/1h</b><br/>
							</div>
						</div>
						<div style="float:left">
                             <div class="menager">
            	    <a href="Formularz.php">
            	    										<img src="img/Trening Obwodowy.jpg" alt="Trening Obwodowy" title="Trening Obwodowy" border="0" width="160" height="120" />
																		</a> <br/>
            	    <br/><b>Trening obwodowy, Kazimierza Wielkiego 45, Cena: 40 zł/1h</b><br/>
							</div>
						</div>
						<div style="clear:both;"></div>
						
						<div style="float:left">
						 <div class="menager">
            	    <a href="Formularz.php">
            	    										<img src="img/Trening całego ciała.jpg" alt="Trening całego ciała" title="Trening całego ciała" border="0" width="160" height="120" />
																		</a> <br/>
            	    <br/><b>Trening całego ciała, Kazimierza Wielkiego 45, Cena: 35 zł/1h</b><br/>
							</div>
						</div>
						<div style="float:left">
						 <div class="menager">
            	    <a href="Formularz.php">
            	    										<img src="img/Siłownia.jpg" alt="Siłownia" title="Siłownia" border="0" width="160" height="120" />
																		</a> <br/>
            	    <br/><b>Siłownia, Kazimierza Wielkiego 45, Cena: 40 zł/1h</b><br/>
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