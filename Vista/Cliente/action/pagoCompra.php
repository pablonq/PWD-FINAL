<?php
include_once ("../../../configuracion.php");
require '../../../vendor/autoload.php';
//pasa el carrito al estado iniciada
$datos= data_submitted();//idusuario
verEstructura($datos);
$obj = new AbmCompraEstado();
$resp = $obj->pagarCompra($datos['idusuario']);

$mailUsuario = $datos['email'];
$nombreUsuario = $datos['nombre'];
$asunto = $datos['asunto'];
$body =  $datos['body'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true); 
if($resp){
    header('Location: ../misCompras.php');
    $ObjMail = new Mail();
    $enviarMail = $ObjMail->enviarCorreo($mailUsuario, $nombreUsuario, $asunto, $body);
  
}else{
    header('Location: ../misCompras.php');
}

?>