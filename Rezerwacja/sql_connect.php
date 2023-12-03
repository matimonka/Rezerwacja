<?php

	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "system_rezerwacji";

$mysqli = new mysqli($host,$db_user,$db_password,$db_name);
$mysqli->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
$mysqli->query("SET CHARSET utf8");

if($error = $mysqli->connect_errno) {
    die("Wystąpił błąd! Błąd połaczenia nr ".$error);
}

?>