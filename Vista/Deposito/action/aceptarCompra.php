<?php
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
//verEstructura($datos);
$objEstado = new AbmCompraEstado();
$compraAceptada = $objEstado->aceptarCompra($datos);

$objCompra = new AbmCompra();
$arrayCompra = $objCompra->buscar($datos);
$compra = $arrayCompra[0];

$nombreUsuario = $compra->getObjUsuario()->getUsNombre();
$mailUsuario = $compra->getObjUsuario()->getUsMail();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);  
$body = 'Hola <b>'.$nombreUsuario.'!</b>, Te queriamos avisar que tu compra a sido <b>ACEPTADA!</b>. Te informaremos a la brevedad como avanza tu compra.<br> FERRETERIA CHANETON';
$asunto = 'Estado de tu compra';

if($compraAceptada){

    header("Location: ../gestionarCompras.php");
    $ObjMail = new Mail();
  $enviarMail = $ObjMail->enviarCorreo($mailUsuario, $nombreUsuario, $asunto, $body);

}else{
    header("Location: ../gestionarCompras.php");
}

?>