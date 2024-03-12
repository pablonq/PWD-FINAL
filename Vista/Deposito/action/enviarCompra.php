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
$body = 'Hola <b>'.$nombreUsuario.'!</b>, Gracias por tu compra. Ya está en camino a tu domicilio.<br> FERRETERIA CHANETON';
$asunto = 'Tu Compra esta en camino';
if($enviada){
  header("Location: ../gestionarCompras.php");
  $ObjMail = new Mail();
  $enviarMail = $ObjMail->enviarCorreo($mailUsuario, $nombreUsuario, $asunto, $body);

}else{
    header("Location: ../gestionarCompras.php");
}
?>