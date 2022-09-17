<?php

error_reporting( E_STRICT );

require_once( 'vendor/PHPMailer/class.phpmailer.php' );
require_once( 'vendor/PHPMailer/class.pop3.php' ); // required for POP before SMTP

$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = "smtp-relay.sendinblue.com"; // SMTP server
$mail->SMTPDebug = 2; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Host = "smtp-relay.sendinblue.com"; // sets the SMTP server
$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = "angelarozova@gmail.com"; // SMTP account username
$mail->Password = "qG4Ek6yLnPhMN10p"; // SMTP account password

$mail->SetFrom( 'yourpsychologist@infinityfreeapp.com', 'Your Psychologist' );

$mail->AddReplyTo( $_POST[ 'email' ], $_POST[ 'name' ] );

$mail->Subject = "Your Psychologist - Связаться со мной";

$mail->Body = <<<HTML
    <p>Ваш электронный адрес: {$_POST['email']}</p>
    <p>Ваше имя: {$_POST['name']}</p>
    <p>Ваш возраст: {$_POST['age']}</p>
    <p>Ваш пол: {$_POST['sex']}</p>
    <p>Ваше сообщение: {$_POST['message']}</p>
HTML;

$address = "angelarozova@gmail.com";
$mail->AddAddress( $address, "Angela Rozov" );

$mail->CharSet = 'UTF-8';

if ( !$mail->Send() ) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  header("Location: emailsent.html");
}

?>