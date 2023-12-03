<?php

require 'C:\xampp\htdocs\Rezerwacja\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Rezerwacja\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Rezerwacja\PHPMailer\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$imie = $_POST['name'];
$email = $_POST['email'];

if(isset($_POST["send"]))
{
	$mail = new PHPMailer(true);
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'monka6299@gmail.com';
	$mail->Password = 'hzzwwbxiwofwtncy';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->SMTPOptions = array(
	'ssl' => array(
	'verify_peer' => false,
	'verify_peer_name' => false,
	'allow_self_signed' => true
)
);
	
	$mail->setFrom('monka6299@gmail.com', $imie); 
	$mail->addAddress('monka6299@gmail.com');
	$mail->addReplyTo($email, $imie);
	
	
	$mail->isHTML(true);
	$mail->Subject = $_POST["subject"];
	$mail->Body = $_POST["message"];
	
	$mail->send();
	
	echo
	header('Location:Kontakt.php');
	
}
?>