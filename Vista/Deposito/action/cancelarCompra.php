<?php
include_once ("../../../configuracion.php");
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
$body = 'Hola <b>'.$nombreUsuario.'!</b>, Lamentablemente tu compra a sido <b>CANCELADA</b>. A la brevedad nos estaremos comunicando telefonicamente para dar explicaciones de la situaci´n de tu compra. Saludos.<br> <b>FERRETERIA CHANETON</b>';
$asunto = 'Noticias sobre tu compra';

if($cancelado){
    header("Location: ../gestionarCompras.php"); 
}else{
    header("Location: ../gestionarCompras.php"); 
}
?>