<?php
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
//verEstructura($datos);
$objEstado = new AbmCompraEstado();
$enviada = $objEstado->enviarCompra($datos);
if($enviada){
    header("Location: ../gestionarCompras.php");
}else{
    header("Location: ../gestionarCompras.php");
}



?>