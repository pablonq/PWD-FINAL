<?php
include_once ("../../../configuracion.php");
require '../../../vendor/autoload.php';
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
verEstructura($datos);
$objEstado = new AbmCompraEstado();
$cancelado = $objEstado->cancelarCompra($datos);

$objCompra = new AbmCompra();
$arrayCompra = $objCompra->buscar($datos);
$compra = $arrayCompra[0];

$nombreUsuario = $compra->getObjUsuario()->getUsNombre();
$mailUsuario = $compra->getObjUsuario()->getUsMail();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);  
$body = $datos['body'];
$asunto = $datos['asunto'];

if($cancelado){
  header("Location: ../gestionarCompras.php");
  $ObjMail = new Mail();
  $enviarMail = $ObjMail->enviarCorreo($mailUsuario, $nombreUsuario, $asunto, $body);

}else{
    header("Location: ../gestionarCompras.php"); 
}
?>