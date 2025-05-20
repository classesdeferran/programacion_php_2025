<?php
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';





//print_r($_SESSION);

$cuerpoMensaje = "<p>Aprecido/Apreciada ". $_SESSION['nombre_usuario']. ": </p><br>";
$cuerpoMensaje .= "<p>Este es el enlace necesario para que puedas acceder al servicio</p><br>";
$cuerpoMensaje .= "<p> <a href='http://". $_SESSION['ruta'] ."'>HAZ CLIC AQUÍ</a></p>";
// $cuerpoMensaje .= "<p> <a href='https://moodle.gardencode.es'>HAZ CLIC AQUÍ</a></p>";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ferran.cursos.web@gmail.com';                         //SMTP username
    $mail->Password   = 'vdwtnommvcveaxpf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ferran.cursos.web@gmail.com', 'Jo mateix'); // Remitente
    $mail->addAddress($_SESSION['email'], $_SESSION['nombre_usuario']);   // Receptor  
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = "UTF-8";
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registro en APP COLORES'; // Asunto del mensaje
    $mail->Body    = $cuerpoMensaje;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';

    header('location: index.php?formulario=login');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
   