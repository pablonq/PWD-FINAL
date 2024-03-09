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
  $ObjMail = new Mail();
  $enviarMail = $ObjMail->enviarCorreo($mailUsuario, $nombreUsuario);

}else{
    header("Location: ../gestionarCompras.php");
}
?>