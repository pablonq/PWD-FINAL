<?php
require '../../../vendor/autoload.php';
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
//verEstructura($datos);
$objEstado = new AbmCompraEstado();
$enviada = $objEstado->enviarCompra($datos);

$objCompra = new AbmCompra();
$arrayCompra = $objCompra->buscar($datos);
$compra = $arrayCompra[0];

$nombreUsuario = $compra->getObjUsuario()->getUsNombre();
$mailUsuario = $compra->getObjUsuario()->getUsMail();


//Libreria Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);  

if($enviada){
  header("Location: ../gestionarCompras.php");
 /*  $ObjMail = new Mail();
  $enviarMail = $ObjMail->enviarCorreo($mailUsuario, $nombreUsuario); */

  
  try {
    
    $mail->SMTPDebug = 2;                                     //Activacion salida errores
    $mail->isSMTP();                                          //Enviar usando protocolo SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Host
    $mail->SMTPAuth   = true;                                 //Autenticacion de protocolo
    $mail->Username   = 'pablo.navarro@est.fi.uncoma.edu.ar'; //Remitente
    $mail->Password   = '27493233';                           //password
    $mail->SMTPSecure = 'ssl';                                //Encryption
    $mail->Port       = 465;                                   //TCP port to connect
  
    $mail->setFrom('pablo.navarro@est.fi.uncoma.edu.ar', 'Ferreteria Chaneton');
    $mail->addAddress($mailUsuario, $nombreUsuario);     //Destinatario
    
    //Adjuntos
    //$mail->addAttachment('/var/tmp/file.tar.gz');         
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Contenido
    $mail->isHTML(true);                                  //Formato email
    $mail->Subject = 'Tu Compra esta en camino';                              //Asunto
    $mail->Body = 'Hola <b>'.$nombreUsuario.'!</b>, Gracias por tu compra. Ya está en camino a tu domicilio.<br> FERRETERIA CHANETON'; //Mensaje
    $mail->send();

} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}
}else{
    header("Location: ../gestionarCompras.php");
}
?>