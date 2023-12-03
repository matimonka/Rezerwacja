<?php
Session_start();
if (!isset($_SESSION['zalogowany'])) {

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
        <?php

        echo "<p>Jestes zalogowany jako " . $_SESSION['Imie'], " ", $_SESSION['Nazwisko'],  ' [<a style="text-decoration:none; color:blue;" href="logout.php">Wyloguj się!</a>]</p>';
        ?>
      </div>
      <div style="clear:both;"></div>
    </div>


    <nav id="topmenu">
      <ul class="menu">
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="Obiekty.php" class="current">Wybierz boisko</a></li>
        <li><a href="Regulamin.php">Regulamin</a></li>
        <li><a href="Kontakt.php">Kontakt</a></li>

      </ul>
    </nav>
    <div id="leftmenu">
      <ul class="sport">
        <li><a href="Piłka nożna.php" class="current1">Piłka nożna</a></li>
        <li><a href="Koszykówka.php">Koszykówka</a></li>
        <li><a href="Zajęcia fitness.php">Zajęcia fitness</a></li>
        <li><a href="Tenis ziemny.php">Tenis ziemny</a></li>
      </ul>
    </div>
    <div id="content">

      <form action="rezerwacja.php" method="POST">

        <label for="">Imie</label>
        <input type="text" class="form-control" name="Imie" id="Imie" placeholder="Podaj Imie" required> <br>
        <label for="">Nazwisko</label>
        <input type="text" class="form-control" name="Nazwisko" id="Nazwisko" placeholder="Podaj Nazwisko" required> <br>
        <label for="">Email</label>
        <input type="email" class="form-control" name="Email" id="Email" placeholder="Podaj Email" required> <br>
        <label for="date">Termin</label>
        <input type="datetime-local" class="form-control" name="date" id="date" required> <br>
        <label for="car">Wybierz dyscypline</label>
        <select name="sport" class="form-control" id="sport">
          <option value=''>WYBIERZ Zajęcia</option>
          <option value='1'>Piłka Nożna, Orlik</option>
          <option value='2'>Piłka Nożna, Ślężna 21 </option>
          <option value='3'>Koszykówka, Sportowa 2</option>
          <option value='4'>Koszykówka, Ślężna 21</option>
          <option value='5'>Tenis ziemny, Kort 1</option>
          <option value='6'>Tenis ziemny, Kort 2</option>
          <option value='7'>Tenis ziemny, Kort 1</option>
          <option value='8'>Yoga, Kazimierza Wielkiego 45</option>
          <option value='9'>Trening Obwodowy, Kazimierza Wielkiego 45</option>
          <option value='10'>Spinning, Kazimierza Wielkiego 45</option>
          <option value='11'>Trening Całego ciała, Kazimierza Wielkiego 45</option>
          <option value='12'>Siłownia, Kazimierza Wielkiego 45</option>
        


        </select> <br>

        <input class="button" type="submit" value="Zarezerwuj" />
      </form>



    </div>
    
    <div style="clear:both;"></div>
					<div style="text-align:center; color:white; margin-top: 10px;" >
					COPYRIGHT: Mateusz Mońka 2022
					</div>
  </div>
</body>

</html>